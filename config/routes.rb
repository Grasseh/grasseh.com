Rails.application.routes.draw do
  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html

  # Reveal health status on /up that returns 200 if the app boots with no exceptions, otherwise 500.
  # Can be used by load balancers and uptime monitors to verify that the app is live.
  get "up" => "rails/health#show", as: :rails_health_check

  # Render dynamic PWA files from app/views/pwa/* (remember to link manifest in application.html.erb)
  # get "manifest" => "rails/pwa#manifest", as: :pwa_manifest
  # get "service-worker" => "rails/pwa#service_worker", as: :pwa_service_worker

  # Defines the root path route ("/")
  root "index#index"
  get "video-game-results" => "video_game_results#index"
  get "hall-of-fame" => "hall_of_fame#index"
  get "competitions" => "competitions#index"
  get "projects" => "projects#index"
  get "blog" => "blog#index"
  get "blog/:slug" => "blog#post"
  get "logparser" => "logparser#index"
  get "rss/blog/feed" => "blog#feed", defaults: { format: "xml" }
end
