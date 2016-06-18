welikelunch
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
	Testing the AddDiner logic
		Testy bits (I won't do this for every function, but these are the various tests I ran)
		- /welikelunch/api/?func=add_diner&email=ctrulove@poolsupplyworld.com&name=Christopher&pass1=ocelot&pass2=ocelot
			- Passed
		- /welikelunch/api/?func=add_diner&email=ctrulove@poolsupplyworld.com&name=Christopher&pass1=ocelot&pass2=ocelot
			- Failed: Duplicate	
		- /welikelunch/api/?func=add_diner&email=robert'); DROP TABLE students;@poolsupplyworld.com&name=Christopher&pass1=ocelot&pass2=ocelot
			- Failed: Invalid email
		- /welikelunch/api/?func=add_diner&email=ctrulove@poolsupplyworld.com&name=Christopher&pass1=ocelot&pass2=goat
			- Failed: Mismatched password	
		- /welikelunch/api/?func=add_diner&email=bob@gravystore.com&name=Bob&pass1=ocelot&pass2=ocelot
			- Failed: Invalid domain
		- /welikelunch/api/?func=add_diner&email=ctrulove@poolsupplyworld.com&name=robert'); DROP TABLE students;&pass1=ocelot&pass2=ocelot
			-Failed: Invalid chars in name

Session 5a
	Completed some more queries