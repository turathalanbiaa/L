@extends("Website::user.app-layout")

@section("title")
    <title>{{session("user.name")}}</title>
@endsection

@section("content")
    <style>
        #myScroll {
            border: 1px solid #999;
        }

        p {
            border: 1px solid #ccc;
            padding: 50px;
            text-align: center;
        }

        .loading {
            color: red;
        }
        .dynamic {
            background-color:#ccc;
            color:#000;
        }
    </style>

    <h1 class="text-center">Hello User, Welcome to your home page.</h1>



    <div id="myScroll">
        <p>
            Contents will load here!!!.<br />
        </p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
        <p >This is test data.<br />Next line.</p>
    </div>
@endsection

@section("script")
    <script>
        let counter=0;
        $(window).scroll(function () {
            if ($(window).scrollTop() == $(document).height() - $(window).height() && counter < 2) {
                appendData();
            }
        });
        function appendData() {
            var html = '';
            for (i = 0; i < 10; i++) {
                html += '<p class="dynamic">Dynamic Data For Line- '+ i + ':  This is test data.<br />Next line.</p>';
            }
            $('#myScroll').append(html);
            counter++;

            if(counter==2)
                $('#myScroll').append('<button id="uniqueButton" style="margin-left: 50%; background-color: powderblue;">Click</button><br /><br />');
        }
    </script>
@endsection
