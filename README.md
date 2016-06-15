welikelunch
Christopher TruLove

Here we go...

Data:

users (email, pass)

/*
Red Herring... to much to learn to make this worth while, I've DONE SSO before and Googles shroud of mystery is still too thick for me to penetrate in a reasonable amount of time.
- google apps auth... hmmm... NEW THINGS TO LEARN! Wheeeee...
	- Wow thats a really horrible application page, I'm sure it makes perfect sense if you already know how to do it... 
	- Looking through the project I think it is potentially less painful to implement auth0 upfrony
*/

Users... streamlined creation

restaurants ( Name, address )

comments (keyed to user and restaurant, not tied to ratings)

ratings (keyed to user and restaurant)
- ?? use 1 and 5 for thumbs up and down so that we can reconfigure for a star rating in the future without reconstructing the data)?
- dated
	- ratings don't get replaced by secondary rating by a user, rather appended, to track trends

groups & voting (we'll see, probably skip it in the first pass)


Session 1:
	Visualized and started kicking ideas around, hung myself up on authentication long enough to realize it is going to bring me down if I let it.
	Built my repository
	Used Initializr with jQuery/Bootstrap to save a few minutes building.  Gets me passed the blank canvas, and brings me something that looks appealing.
	Started visualizing the data.

Session 2:
	Set up hosting (http://trulove.cc/welikelunch)
	Built the database tables (tablestructure.txt)
	Built user create form