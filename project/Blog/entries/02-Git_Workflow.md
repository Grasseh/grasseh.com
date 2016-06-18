Thoughts about git workflows
----------

###### Saturday June 18th, 2016

We've being arguing about our Git workflow, at work, for the last few months. We seem to all like the same general idea, but seem to take different approaches to our workflows. One coworker put some unfinished work on a release branch so it could be tested and it annoyed me.

My ideal Git Workflow would be as following :

Three persistent branches. Dev,Rc and Master. 
All three of these should be considered "stable".
By that, I mean that there shouldn't be incomplete features on any of these branches.
Of course, since no program is perfect, there could obviously be bugs on those, but these branches can handle those well.

The master branch should correspond to what is present on the production server, or what people fetch from a package manager. 
It should be stable and EVERY SINGLE COMMIT in master should be version tagged. 
Why? Because the only commits present in master are either merges from the rc(release candidate) branch, or a merge from a hotfix temporary branch. 
If it's from a hotfix branch, it should still go up a version (x.x.1 or x.x.x.1 depending on the system you're using). 
If it's from the rc branch, it's necessarily for a new release, which deserves a new tag by itself.

The rc branch contains content and features that are done developping and that will be included in the next release. 
The reason it is not deployed is for Q/A and testing. 
This branch starts with a merge from the dev branch, marking the point where we have ALL features ready for the next release. 
Anything that we don't want for this release shouldn't have been on dev anyways. 
After this merge, this branch allows commits that are present to patch the introduced features. 
These patches can be merged back into dev instantly if they are major, but can wait if they are minor. 
When everything in this branch has thoroughly been tested, it is merged into both dev and master, marking the new release in master with a new tag.

The dev branch is the one that feels the most misunderstood to me. 
People tend to (and I still do this myself) commit directly on this branch, with uncompleted features, as they are "in development" features.
I disagree wih this practice. I believe the dev branch should be about integrating these changes with each other, as they sould all come from different feature branches.
All commits on the dev branch should be patches or merges. 
This means that anybody that wants to start working from any point on the dev branch can do so, on a "stable" version.

I've mentionned two other branches in there. 
These are ephemeral branches. You temporarily create theme, just to delete them when you are done with them

The first of these is the hotfix branch. It is created when an important issue has been raised and must be pushed to production before the next release.
This branch is created from the current master branch, and when done, is merged into master(with a tag) and into dev.

The second one is feature branches. These will have different name as you use them.
When creating your blog, you may have a features/blog branch.
When your blog is completely created, functional and tested, you can merge it into dev. 
That means it is READY for the next version (the one after the current rc). 
If you need to wait before releasing this, I'd suggest keeping it in its features branch, and then merging it in dev when you want to release it.

