@extends("Website::visitor.app-layout")

@section("title")
    <title>انشاء حساب مستمع</title>
@endsection

@section("content")
    <section class="view listener account @if($errors->any()) error @endif">
        <div class="mask turath-gradient-color d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form class="card card-bg-light white-text" autocomplete="off" method="post" action="/store-listener-account">
                            <div class="card-body">
                                <div class="h3-responsive font-weight-light align-middle text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 438.125 385">
                                        <path fill-rule="evenodd" fill="white" d="M197,256h35a32,32,0,0,1,32,32V391a32,32,0,0,1-32,32H197a60,60,0,0,1-60-60V316A60,60,0,0,1,197,256Zm0,41h15a10,10,0,0,1,10,10v65a10,10,0,0,1-10,10H197a20,20,0,0,1-20-20V317A20,20,0,0,1,197,297Zm148-41h35a60,60,0,0,1,60,60v47a60,60,0,0,1-60,60H345a32,32,0,0,1-32-32V288A32,32,0,0,1,345,256Zm20,41h15a20,20,0,0,1,20,20v45a20,20,0,0,1-20,20H365a10,10,0,0,1-10-10V307A10,10,0,0,1,365,297ZM70,352m-1,0V257S76.748,47.422,288,38c190.916,2.12,218.7,199.362,219,220s0,95,0,95-2.664,15.33-13,15a137.4,137.4,0,0,0-14,0s-13.878-.741-15-14,0-97,0-97S466.725,92.951,288,80c-110.023,4.636-178,94.16-178,178v95s-1.74,14.231-13,15-15,0-15,0S71.2,369.037,69,352Z" transform="translate(-69 -38)"/>
                                    </svg>
                                    <span class="align-middle">انشاء حساب مستمع</span>
                                </div>
                                <div class="form-row">
                                    @csrf()
                                    <div class="col-md-4 col-sm-12">
                                        <div class="md-form">
                                            <input type="text" name="name" id="name" class="form-control" value="{{old("name")}}" autocomplete="">
                                            <label for="name">الاسم الرباعي واللقب</label>
                                            @error('name') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="md-form">
                                            <input type="email" name="email" id="email" class="form-control" value="{{old("email")}}" autocomplete="">
                                            <label for="email">البريد الالكتروني</label>
                                            @error('email') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="md-form">
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{old("phone")}}" autocomplete="">
                                            <label for="phone">الهاتف</label>
                                            @error('phone') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="md-form">
                                            <input type="password" name="password" id="password" class="form-control" autocomplete="">
                                            <label for="password">كلمة المرور</label>
                                            @error('password') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="md-form">
                                            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control" autocomplete="">
                                            <label for="password-confirmation">تأكيد كلمة المرور</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="md-form dropdown">
                                            <input type="text" name="gender" id="dropdown-gender" class="form-control" value="{{\App\Enum\Gender::getGenderName(old("gender"))}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <label for="dropdown-gender">الجنس</label>
                                            @error('gender') <div class="text-warning">{{ $message }}</div> @enderror
                                            <div class="dropdown-menu dropdown-turath w-100 mt-3" aria-labelledby="dropdown-gender" id="dropdown-gender-menu">
                                                @foreach($genderList as $gender)
                                                    <div class="dropdown-item" data-value="{{$gender}}" data-text="{{\App\Enum\Gender::getGenderName($gender)}}">{{\App\Enum\Gender::getGenderName($gender)}}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="md-form dropdown">
                                            <input type="text" name="country" id="country" class="form-control autocomplete" value="{{old("country")}}">
                                            <label for="country">البلد</label>
                                            @error('country') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none">
                                    <input type="hidden" name="gender" value="{{old("gender")}}">
                                </div>
                                <div class="text-center mt-4">
                                    @if(session()->has("error"))
                                        <div class="my-2 font-small text-warning">{{session("error")}}</div>
                                    @endif
                                    <button class="btn btn-outline-white">ارسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }
            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
        }
        let countries = [
            @foreach($countries as $country)
            {!! "'" . $country . "'," !!}
            @endforeach
        ];
        autocomplete(document.getElementById("country"), countries);
        $("#dropdown-gender-menu .dropdown-item").click(function () {
            $(this).parent().parent().find("label").addClass("active");
            $("input[type='text'][name='gender']").val($(this).data("text"));
            $("input[type='hidden'][name='gender']").val($(this).data("value"));
        });
    </script>
@endsection
