@extends("Website::visitor.app-layout")

@section("title")
    <title>انشاء حساب طالب</title>
@endsection

@section("content")
    <section class="view student account @if($errors->any()) error @endif">
        <div class="mask turath-gradient-color d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form class="card card-bg-light white-text" autocomplete="off" method="post" action="/store-student-account">
                            <div class="card-body">
                                <div class="h3-responsive font-weight-light align-middle text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 549.063 331">
                                        <path fill-rule="evenodd" fill="white" d="M264,68L43,138S12.412,149.2,14,176s29,38,29,38l18,6-3,14s-17.027,6.086-17,24,15,22,15,22L31,378s-3.194,14.658,15,16,47,1,47,1,15.468,1.078,14-17c-2.831-12.629-22-99-22-99s11.191-3.678,12-22-13-20-13-20l6-9,48,14-14,97s-5.4,51.117,165,56c107.711,0.8,165.6-33.329,163-56s-12-97-12-97l93-29s26.85-3.139,30-38c-0.484-26.687-30-38-30-38L313,71S296.252,57.556,264,68ZM177,255l-12,77s112.655,50.907,246-1c-10.655-77.337-11-78-11-78l-86,28s-21.178,10.535-51,0C225.91,270.465,177,255,177,255ZM60,174l217-65s9.6-3.256,24,1,216,65,216,65L301,243s-10.071,5.684-26,0-129-41-129-41l146-26s15.932-17.869-6-28c-24.2,4.854-190,38-190,38Z" transform="translate(-13.938 -64.031)"/>
                                    </svg>
                                    <span class="align-middle">انشاء حساب طالب</span>
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
                                    <div class="col-md-4 col-sm-12">
                                        <div class="md-form">
                                            <input type="password" name="password" id="password" class="form-control" autocomplete="">
                                            <label for="password">كلمة المرور</label>
                                            @error('password') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="md-form">
                                            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control" autocomplete="">
                                            <label for="password-confirmation">تأكيد كلمة المرور</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="md-form">
                                            <input type="text" name="address" id="address" class="form-control" value="{{old("address")}}" autocomplete="">
                                            <label for="address">العنوان</label>
                                            @error('address') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="md-form">
                                            <input type="date" name="birthdate" id="birthdate" class="form-control browser-default" value="{{old("birthdate")}}" autocomplete="">
                                            <label for="birthdate" class="active">تاريخ الميلاد</label>
                                            @error('birthdate') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
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
                                    <div class="col-md-3 col-sm-12">
                                        <div class="md-form dropdown">
                                            <input type="text" name="scientificDegree" id="dropdown-scientific-degree" class="form-control" value="{{\App\Enum\Certificate::getScientificDegreeName(old("scientificDegree"))}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <label for="dropdown-scientific-degree">الشهادة العلمية</label>
                                            @error('scientificDegree') <div class="text-warning">{{ $message }}</div> @enderror
                                            <div class="dropdown-menu dropdown-turath w-100 mt-3" aria-labelledby="dropdown-scientific-degree" id="dropdown-scientific-degree-menu">
                                                @foreach($scientificDegreeList as $scientificDegree)
                                                    <div class="dropdown-item" data-value="{{$scientificDegree}}" data-text="{{\App\Enum\Certificate::getScientificDegreeName($scientificDegree)}}">{{\App\Enum\Certificate::getScientificDegreeName($scientificDegree)}}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="md-form dropdown">
                                            <input type="text" name="country" id="country" class="form-control autocomplete" value="{{old("country")}}">
                                            <label for="country">البلد</label>
                                            @error('country') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none">
                                    <input type="hidden" name="gender" value="{{old("gender")}}">
                                    <input type="hidden" name="scientificDegree" value="{{old("scientificDegree")}}">
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
        $("#dropdown-scientific-degree-menu .dropdown-item").click(function () {
            $(this).parent().parent().find("label").addClass("active");
            $("input[type='text'][name='scientificDegree']").val($(this).data("text"));
            $("input[type='hidden'][name='scientificDegree']").val($(this).data("value"));
        });
    </script>
@endsection
