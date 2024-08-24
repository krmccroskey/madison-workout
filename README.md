# Madison Workout Computer

This is a project I created for my fiance so that she could manage her athletes, and calculate their workout times in a much easier way.

It took about a year for me to finally ask what was taking so long with her workout planning (sometimes 2+ hours a night). She told me that she had to navigate to a specific website, enter the athlete's splits in a specific race (that she had written down in a notebook), and input the data on the site. She had to click out of an ad window every time, for every athete.

As a developer I felt a little sick watching the process.

So - the 'Madison Workout Computer' was born. It's a laravel app that I threw together, mostly for accessibility and her ease of use. I put my thought process in the code here and there - but it is not up to spec in that regard - just something I wanted to get working for her ASAP. I'm not expecting much here but I am willing to help anyone with issues getting things set up if they wish. I mainly just wanted to have this source controlled for my own sanity, and in case my blade in the HVAC room finally claps out.

It's been a few months since I finished this up so I am a bit hazy on some details. I will give an overview of setup / operation.

## Requirements

1. You will need a host pc for the webapp. You could probably get away with local machine hosting but I won't speak to that.
2. MySQL Database
3. Composer, php, python, ... I can't remember which versions right now.
4. Maybe something else here

## Installation

If you're familiar with a LAMP stack, it's pretty straightforward. 
Just clone the repo wherever you want it hosted, configure the daemon you're hosting it with, and yeah.

I won't spell it out but some pitfalls are permissions errors and ownership errors of files.

Then just do a composer update and the app should be set up to run.

### Database Schema

I dumped the schema into madisonworkout_schema.sql. Import it to your mysql and you're good to go.


## Usage

Navigate to the webapp and you should see a 'Dashboard', and there should be nothing in it, lol.

The tabs up top are where the functionality are. 'Manage Athletes' will let you do just that - edit or "retire".

'Add Athlete' will let you create a new athlete.

### Workout Generation

At this point the usage should be straightforward. Select the workout distance and their time you want to base the workout on.

Then you can select the athletes you want to generate the workout for, and submit the form.

If everything works out, you should see "Workout Created Successfully! and the output.

-

-

I hope this can help some people in a similar way that it has helped Madison - to focus on the athletes and leave the computing to the computers. 

Please reach out with any questions!

-KM