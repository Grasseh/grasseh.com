class BlogController < ApplicationController
  before_action do
    @metadata = YAML.load(
      File.read(
        "old_php_server/resources/blog/metadata.yaml"
      )
    )
  end

  def index
    @posts = @metadata.dig("posts").map do |post|
      title = post.dig("title")
      slug = title.parameterize
      date = post.dig("date")
      id = post.dig("id")
      "<a href='/blog/#{slug}'> #{id} - #{title} - #{date}</a>"
    end
  end

  def post
    post = @metadata.dig("posts").find do |post|
      post.dig("title").parameterize == params.dig("slug")
    end

    unless post
        raise ActionController::RoutingError.new("Not Found")
    end

    file = Dir.glob(
      "old_php_server/resources/blog/entries/*#{post.dig("id")}-*.md"
    ).first

    unless file
        raise ActionController::RoutingError.new("Not Found")
    end

    data = File.read(file)
    parser = Redcarpet::Markdown.new(Redcarpet::Render::HTML, extensions = {})
    @content = parser.render(data)
    @description = post.dig("description")
    @name = post.dig("title")
  end

  def feed
    rss = RSS::Maker.make("atom") do |maker|
      maker.channel.author = "Grasseh"
      maker.channel.updated = Time.now.to_s
      maker.channel.about = "https://www.grasseh.com/blog"
      maker.channel.title = "Steve's Blog Posts"

      @metadata.dig("posts").each do |post|
        maker.items.new_item do |item|
          item.link = "https://www.grasseh.com/blog/#{post.dig("title").parameterize}"
          item.title = post.dig("title")
          item.updated = post.dig("date")
          item.summary = post.dig("description")
        end
      end
    end

    respond_to do |format|
      format.xml { render xml: rss.to_xml }
    end
  end
end
