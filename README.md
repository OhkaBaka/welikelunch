welikelunch Project Log
Christopher TruLove

Session 1:
	Visualized and started kicking ideas around, hung myself up on authentication long enough to realize it is going to bring me down if I let it.
	Built my repository
	Used Initializr with jQuery/Bootstrap to save a few minutes building.  Gets me passed the blank canvas, and brings me something that looks appealing.
	Started visualizing the data.

Session 2:
	Set up hosting (http://trulove.cc/welikelunch)
	Built the database tables (tablestructure.txt)
	Decided for the sake of speed to NOT have sessions, you will have to pass your credentials every time you rate something -  TECHNICALLY it doesn't have to be secure, but it helps protect against spam of user names (robert rob bob bobby).
	Built "diner" create form

Session 3:
	Configured ftp for the first time since Windows10 and actually pushed some code to trulove.cc
	Built "eatery" create form
	Built "rating"/"comment" form (version 1?)
	My son Lex just came in and said... "Oh... I can see by what you are coding you are making some sort of restaurant game" I said "sort of," because it is a game in its own way, and because why would I ever disuade my kid from believing that I was making a game.  It occurs to me I should have given him this project, it would be done already... possibly in scratch... but done.
	Google Map thumbnails! Its been a while since I had an excuse to use my gMaps key.
	Built a rough of the "list" of restaurants, just so that hole in the page is filled.
	Mapped functions with an eye on unit testing... actually I say things like this and then I realize I don't know how to build so it COULDN'T be unit tested... how would you know if it worked.
	YES... this should be OOP... no, it won't be.
	Built the initial page loader for the eatery list with dummy data, so I can make sure it works before I get the list renderer in place.

Session 4a:
	Built some query logic while I was on a break

Session 4b:
	Built some more query logic.
	Separated the query logic from the control logic (good developer, have a cookie)
	Tested the AddDiner logic manually

Session 5a
	Completed some more (potentially "all") of the queries

Session 5b
	Watched Orange is the New Black instead of spending that time testing queries... possibly a bad idea.

Session 6 (Saturday Morning)
	Freaked out when my queries were missing... turns out I updated the code with the copy and pasted gmail.
	In lieu of installing a test framework I'm going to build in a few tests I can periodically verify. Cowboy Unit Testing... I'm not ashamed.
	I didn't expect the testing of this to go so long, but I'm very satisfied with the results, the test setups helped me validate much and fix even more.  Moving on to build logic.

Session 7 (Saturday Afternoon)
	Built Eatery list builder, replaced the dummy on the main page, first component to be updated to the product properly. Woo!
	Glyphicons are not behaving... have to circle back to this, don't wanna worry about it now.
	Built the eatery review builder.
	Got the Eatery list to trigger the load for the Eatery review. Woo!
	Going to check it in prod to make sure everything is functioning, going to push code as well...
	Next stop, MVP

Session 8 (Sunday Afternoon)
	M V P ... ahhh... took way too long to get here, but I worked cautiously and I'm surprisingly happy with the outcome.
	Caveats:
		- It looks like butt.  I'll keep tinkering on it for a bit to clean it up, glyphicons and whatnot... but it works as intended.
		- Fewer bells and whistles than I imagined.
		- The code got a little cowboy as I got closer to the finish line, though I fixed a few things I had set up yesterday that were just embarrassingly wrong.

Session 8.1
	Oooh ooh... I can put the office on the map WITH the restaurant to show its relative location... OK... NOW I'm going to go prettify