<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple Laravel</title>

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        .table {
            margin: 25px;
        }

        .genre {
            background-color: #ccd5d9;
            color: black;
            border-radius: 10px;
            padding: 3px;
            margin-bottom: 6px;
            background-clip: border-box;
            display: block;
        }

        th, td {
            width: 10%;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Magazines
        </div>

        <div class="links">
            <a href="/add" class="btn btn-xs btn-info pull-right">Add magazine</a>
        </div>

        @if (count($magazines) > 0)
        <table class="table">
            <tr>
                <th><strong>Title</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>Publisher</strong></th>
                <th><strong>Publication Code</strong></th>
                <th><strong>Publication Number</strong></th>
                <th><strong>Publication Date</strong></th>
                <th><strong>Country</strong></th>
                <th><strong>Language</strong></th>
                <th><strong>Genres</strong></th>
                <th></th>
            </tr>
            @foreach($magazines as $magazine)
                <tr>
                    <td> {{ $magazine->title }} </td>
                    <td> {{ $magazine->name }} </td>
                    <td> {{ $magazine->publisher }} </td>
                    <td> {{ $magazine->publication_code }} </td>
                    <td> {{ $magazine->publication_number }} </td>
                    <td> {{ \Carbon\Carbon::parse($magazine->publication_date)->format('d M Y') }} </td>
                    <td> {{ $magazine->country }} </td>
                    <td> {{ $magazine->language }} </td>
                    <td>
                        @foreach(\GuzzleHttp\json_decode($magazine->genres) as $genre)
                            <label class="genre"> {{ $genre }} </label>
                        @endforeach
                    </td>
                    <td>
                        <div class="links">
                            <a
                                href="/{{ $magazine->id }}/delete"
                                data-token="{{ csrf_token() }}"
                                class="btn btn-xs btn-info"
                            >Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>

    <form>

    </form>
</div>
</body>
</html>
