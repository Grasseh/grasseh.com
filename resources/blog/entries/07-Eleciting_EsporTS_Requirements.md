Eliciting EsporTS Requirements
------------

###### Monday January 30th 2017

### Disclaimer

As I've noted in previous posts, I'm currently a student at the ÉTS (École de Technologie Supérieure).
I'm currently following a Interface Design(ID) class.
I'm also part of a student regroupment called EsporTS, specialized in competitive school e-sports teams.
I'm our second team's top-laner (even though I main mid).

For the ID class, we have 3 projects during the semester.
The first two are provided by our teacher, but the third is up to us.
I decided I would like to build a small Champion Pool + Champion Select app for our League of Legends team captains. 
This blog post will go about how I've elicitated the requirements I'll need to present our teacherin order to get this project accepted.

Note that this post will in no way discuss about the content of the ID class, but will all be about requirements ellicitation.
This is also an example for small side-project. 
The procedure I've used is in no way conform to any standards that should be used for enterprise projects with sensitive data.

### Step 1 : Preparing the base idea

I've had the idea for this app for two semesters. 
Nothing really concrete, but I thought it'd be helpful if our team captains had somewhere to store and gather data about our teams.
This also came from me being tired of filling Google Sheets with my current champion pool.

This ID class brought me the motivation to get up and start working on it.
So I went ahead and discussed about it to my classmates, which were fine with the idea (for lack of any better idea on their parts). 
I then took the time off my ride in the subway(instead of reading/sleeping like I usually do) to write a bunch of topic on my "Notes" native phone application.
These notes were mostly there as part-brainstorm, part-reminder of what I'd need to discuss with the to-be user.

### Step 2 : Interviewing the main user

I then went ahead and contacted our club's president (and captain of our A team). 
He was to be the prime user of the application, and even if doesn't end up as the user, he knows the current need of a captain during our team's scouting, pool handling and champion select.
He agreed to meet up with me for dinner (nothing dancy, we just bought some Tim Hortons), but was a bit reluctant in why I asked him to not meet up at our club's standard room. 
I explained fairly quickly that I wanted it to be one-to-one as our room is usually crowded.
It was enough to convince him, even though the real reasoning was that I did not feel like getting another party involved. 
Having someone else in the Interview process would have turned it into a second brainstorm, and that second party would have most likely not even use the application.

We discussed about the points I had on my phone. 
I was able to understand how he feels about the importance of some features (such as figuring out which champion the enemy might play feels more important to him than knowing what counters what they already picked).
I wrote down(quickly since we did not have much time left for dinner due to some unforeseen events) all we discussed off in a small text document.
The document was mostly reminders of his priorities, to be able to refer to it when time was to come. 

It looked as follows :

```
- Own team
 40 most recent solo queue
 Win Rate + KDA

- Other Team
40 Most recent solo
Win Rate
20 Last Flex + 5-man Customs
Win Rate
Last 2 years
Most 2 played

- Champ Select
What the other players play indicator
Counters (from champ.gg) (less pertinent)
```

### Step 3 : Writing the requirements down

After having a draft ready, I was ready to rewrite the complete app specifications.
I just mixed and matched the draft document and my personnal view of the app.

##### Authentication

AU1. The application shall not be available for anyone that has not previously signed in.

AU2. The application shall have an admin account, with elevated rights.

AU3. The application shall have team captain accounts, able to manage their team.

##### Team Handling

TE1. The application shall be able to have different teams.

  -- Note: Before AU2, they will be created manually. Afterwards, they will be created by the admin account.

TE2. The application shall allow up to 6 members to be added, edited and deleted in each team.

TE3. The application shall fetch data from the players on Riot's API to display the following data :
- Champion pool based on the last 40 Solo Queue Games, 
- KDA and Win Rate on each champion

TE4. The application shall save the team's data.

##### Team Scouting

SC1. The application shall allow 5 players to be simultaneously added on the interface.

SC2. The application shall only display the 5 players for the user's session. No data must be saved.

SC3. The application shall fetch data on the 5 players from Riot's API and display the following:
- Champion pool based on the last 40 Solo Queue Games
- Champion pool based on the last 20 Flex Queue Games + 5v5 Customs (Weighted more heavily than Solo)
- Win Rate and KDA
- Top 2 Champions the player played in the last 3 years (+ win rate)

##### Champion Select Helper

CS1. The application shall allow launch of the CS Helper only when a Team Scounting section has 5 added players. 

CS2. The application must display all players from both the captain's team and the scouted team.

CS3. The application must display the top 3 possible champions each player MAY pick (not banned/picked yet)

CS4. The application shall allow the user to set a player to a picked champion.

CS5. The application shall display the counters to a picked champion if the other laner has not picked one yet 

CS6. The application shall fetch the counter data from Champion.gg every patch (launched manually)

### Step 4 : Ordering requirement priorities

Finally, after checking with our captain if every requirement was fine, I ordered every requirement in order of which is more important to be implemented early.

###### Critical
AU1, TE1, TE2, TE3, SC1, SC2, SC3

###### Important
TE4, CS1, CS2, CS3

###### Useful
CS4, CS5, CS6

