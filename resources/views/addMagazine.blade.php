<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Laravel</title>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 600;
                font-size: 13px;
                height: 100vh;
                margin: 20px;
            }

            form {
                align-items: center;
            }
            select, input {
                height: 40px;
                width: 220px;
                color: #636b6f;
                border-radius: 10px 10px 10px 10px;
                margin: 10px 10px;
                font-weight: 600;
            }
            select[multiple] {
                height: auto;
                width: 220px;
                color: #636b6f;
                border-radius: 10px 10px 10px 10px;
                margin: 10px 10px;
                font-weight: 600;
            }
            label {
                width: 220px;
                color: #636b6f;
                display:inline-block;
                font-weight: 800;
                font-size: 13px;
            }
            .inline-buttons {
                display: inline;
            }
            .links > a, .links > input  {
                display: inline-block;
                width: 220px;
                color: #636b6f;
                margin-top: 50px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .alert-danger {
                color: red;
                font-weight: 800;
                font-size: 13px;
            }
        </style>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Add magazine</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <?php

        echo Form::open(array('url' => '/add'));
        echo Form::label('Title');
        echo Form::text('title','');
        echo '<br/>';

        echo Form::label('Name');
        echo Form::text('name','');
        echo '<br/>';

        echo Form::label('Publisher');
        echo Form::text('publisher','');
        echo '<br/>';

        echo Form::label('Publication code');
        echo Form::text('publication_code','');
        echo '<br/>';

        echo Form::label('Publication number');
        echo Form::text('publication_number','');
        echo '<br/>';

        echo Form::label('Publication date');
        echo Form::date('publication_date', \Carbon\Carbon::now());
        echo '<br/>';

        echo Form::label('Country');
        echo Form::select(
            'country',
            [
                'IE' => "Ireland",
                'GB' => "Great Britain",
                'US' => 'United States',
            ],
            null,
            ['placeholder' => 'Select language']
        );
        echo '<br/>';

        echo Form::label('Language');
        echo Form::select(
            'language',
            [
                'en'    => "English",
                'zh-cn' => 'Chinese'
            ],
            null,
            ['placeholder' => 'Select language']
        );
        echo '<br/>';

        echo Form::label('Genres');
        echo Form::select(
            'genres[]',
            [
                'teen'       => 'Teen',
                'women'      => 'Women',
                'men'        => 'Men',
                'music'      => 'Music',
                'sports'     => 'Sports',
                'film'       => 'Film',
                'gossip'     => 'Fossip',
                'tv listing' => 'TV listing',
                'beauty'     => 'Beauty',
                'hobbies'    => 'Hobbies',
                'animals'    => 'Animals',
                'health'     => 'Health',
            ],
            null,
            ['multiple' => true]
        );
        echo '<br/>';

        echo '
<div class="inline-buttons">
    <span class="links">
        <a href="/" class="btn btn-xs btn-info pull-right">Back</a>
    </span>
    <span class="links">';
        echo Form::submit('Add');
        echo '</span></div>';
        echo Form::close();
        ?>
    </body>
</html>
