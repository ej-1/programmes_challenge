#### Instructions

-   go to http://localhost:8000/programmes/show
-   Type in a show name in the input field and click submit.

##### TODO

-   move form into separate form
-   https://www.tutorialspoint.com/laravel/laravel_forms.htm

-   remove unnecessary data sent to view from query method in ProgrammeController.

-   change intendation to 2 spaces.

-   Use Twitter bootstrap or similar to handle different screen sizes and media queries. Right now it only looks alright on desktop. Not tablet and mobile.

-   remove last HR in programmes-results-container

-   switch to useing BEM. Use SASS.

-   Fix this bug. The JSON output is different sometimes for images. Sometimes it is programme['programme']['image']['pid'] and sometimes it is programme['programme']['pid']. I added a if statement as temporary fix, just prevent things from crashing. The better solution is to conform the JSON before so it all programme objects are uniform. There might be other bugs cause for other attributes as well.

```
    <div class="programme-img-container">
        @if (array_key_exists('image', $programme['programme']))
            <img src={{ "https://ichef.bbci.co.uk/images/ic/480x270/".$programme['programme']['image']['pid'].'.jpg' }}>
        @endif
    </div>
```

-   Public vs private. Most the methods in ProgrammeFinder are private. I chose that for now to encapsulate. An option would have all of them public since the methods are pretty reusable so that would be a way to go. A better way would have been to split up the class into separate classes
    For example, a class that handles reading and parsing while another class is for querying the JSON data.

-   Saving JSON. The programme data could have been saved to a database, but I think for this kind of exercise it is unnecessary and saving it as a file works pretty well anyways.

#### Did not do due to time limitation.

-   The form for rendering the program results should be a separate partial. However, due to time limitation I won't be able to do that.

```
    <div class="programme-results-container">
        @foreach ($programmes as $programme)
            <div class="programme-container">
                <div class="programme-img-container">
                    @if (array_key_exists('image', $programme['programme']))
                        <img src={{ "https://ichef.bbci.co.uk/images/ic/480x270/".$programme['programme']['image']['pid'].'.jpg' }}>
                    @endif
                </div>
                <div class="programme-text-container">
                    <p><strong>{{ $programme['title'] }}</strong></p>
                    <p>{{ $programme['programme']['short_synopsis'] }}</p>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
```

-   Right now two views are used for querying programmes and displaying them. This should be one view where if possible in Laravel, use AJAX to render a new partial with the results without needing to reload the page. Something simple like that might do the trick.

```
    const submitForm = (id) => {;
        let form = document.getElementById(id);
        form.submit();
    }
```

-   Separate CSS from view files into separate files. Use SASS and compile it to SASS.

-   A specified result was the auto-suggest feature. I would have used JavaScript to put an event listener on the input field to listen for the keydown event and then triggered the form to be submitted.

-   Submitting form is done by clicking a submit form. Not sure if desired effect is that submission happen when pushing enter button on keyboard. Would have added an event listener for that.

-   Remove unnecessary files in app that was created when generating app.

-   Tests of course. Unit test primarily and a integration test possibly. This was not specified though.

-   There were some interesting features to implement CSRF protection which would have been good.

-   Added some classes DataFetcher, DataSaver and DataFetcherWorker which I'm not sure works now, but gives some idea on how I code. Single resposibility, encapsulation, small reusable methods, documentation where needed (preferably where the output of a method is unclear), dependency injection etc.

-   The DataFetcherWorker should be called from somewhere. An idea would be to run it periodically to fetch the data and save it on the the server side and probably not for each user request.

-   Overall, there is a lack of error handling. In the app in general, but also e.g. in the ProgrammeFinder class. There shoud be some error thrown if keys don't match the JSON or file is missing for example

#### CSS

-   The CSS I have written can be found in resources/views/programmes/query.blade.php.
