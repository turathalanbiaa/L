@extends("Website::visitor.app-layout")

@section("title")
    <title>معهد تراث الانبياء</title>
@endsection

@section("content")
    <section class="view login @if($errors->any()) error @endif" id="home">
        <div class="mask turath-gradient-color d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row justify-content-around">
                    {{-- Create Account --}}
                    <div class="col-lg-6 col-md-6 col-sm-12 order-lg-1 order-md-1 order-2 py-3 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="row text-white">
                            <div class="col-12 text-center py-3">
                                <div class="h1-responsive font-weight-light align-middle text-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 549.063 331">
                                        <path fill-rule="evenodd" fill="white" d="M264,68L43,138S12.412,149.2,14,176s29,38,29,38l18,6-3,14s-17.027,6.086-17,24,15,22,15,22L31,378s-3.194,14.658,15,16,47,1,47,1,15.468,1.078,14-17c-2.831-12.629-22-99-22-99s11.191-3.678,12-22-13-20-13-20l6-9,48,14-14,97s-5.4,51.117,165,56c107.711,0.8,165.6-33.329,163-56s-12-97-12-97l93-29s26.85-3.139,30-38c-0.484-26.687-30-38-30-38L313,71S296.252,57.556,264,68ZM177,255l-12,77s112.655,50.907,246-1c-10.655-77.337-11-78-11-78l-86,28s-21.178,10.535-51,0C225.91,270.465,177,255,177,255ZM60,174l217-65s9.6-3.256,24,1,216,65,216,65L301,243s-10.071,5.684-26,0-129-41-129-41l146-26s15.932-17.869-6-28c-24.2,4.854-190,38-190,38Z" transform="translate(-13.938 -64.031)"/>
                                    </svg>
                                    <span class="align-middle">الطالب</span>
                                </div>
                                <hr class="hr-light">
                                <h6 class="mb-3 text-justify">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga
                                    nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea
                                    dolor molestiae, quisquam iste, maiores. Nulla.
                                </h6>
                                <a class="btn btn-outline-white" href="/create-student-account">@lang("Website::visitor.title")</a>
                            </div>
                            <div class="col-12 text-center py-3">
                                <div class="h1-responsive font-weight-light align-middle text-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 438.125 385">
                                        <path fill-rule="evenodd" fill="white" d="M197,256h35a32,32,0,0,1,32,32V391a32,32,0,0,1-32,32H197a60,60,0,0,1-60-60V316A60,60,0,0,1,197,256Zm0,41h15a10,10,0,0,1,10,10v65a10,10,0,0,1-10,10H197a20,20,0,0,1-20-20V317A20,20,0,0,1,197,297Zm148-41h35a60,60,0,0,1,60,60v47a60,60,0,0,1-60,60H345a32,32,0,0,1-32-32V288A32,32,0,0,1,345,256Zm20,41h15a20,20,0,0,1,20,20v45a20,20,0,0,1-20,20H365a10,10,0,0,1-10-10V307A10,10,0,0,1,365,297ZM70,352m-1,0V257S76.748,47.422,288,38c190.916,2.12,218.7,199.362,219,220s0,95,0,95-2.664,15.33-13,15a137.4,137.4,0,0,0-14,0s-13.878-.741-15-14,0-97,0-97S466.725,92.951,288,80c-110.023,4.636-178,94.16-178,178v95s-1.74,14.231-13,15-15,0-15,0S71.2,369.037,69,352Z" transform="translate(-69 -38)"/>
                                    </svg>
                                    <span class="align-middle">المستمع</span>
                                </div>
                                <hr class="hr-light">
                                <h6 class="mb-3 text-justify">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga
                                    nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea
                                    dolor molestiae, quisquam iste, maiores. Nulla.
                                </h6>
                                <a class="btn btn-outline-white" href="/create-listener-account">انشاء حساب مستمع</a>
                            </div>
                        </div>
                    </div>

                    {{-- Login --}}
                    <div class="col-lg-5 col-md-6 col-sm-12 order-lg-2 order-md-2 order-1 py-3 wow fadeInRight" data-wow-delay="0.3s">
                        <div class="h-100 card card-bg-light">
                            <div class="card-body">
                                <div class="row py-md-5 py-0">
                                    <div class="col-12 text-center">
                                        <div class="d-flex flex-column">
                                            <i class="far fa-user-circle fa-5x"></i>
                                            <div class="h3-responsive mt-3">تسجيل الدخول</div>
                                            @if(session("error"))
                                                <div class="alert alert-link animated fadeIn delay-1s">
                                                    {{ session("error") }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <form class="col-12" method="post" action="/login">
                                        @csrf()
                                        <div class="md-form">
                                            <i class="far fa-user prefix white-text"></i>
                                            <input type="text" name="username" id="username" class="form-control" value="{{old("username")}}" autocomplete="">
                                            <label for="username">البريد الالكتروتي او رقم الهاتق</label>
                                            @error('username') <div class="text-warning" style="margin-right: 2.5rem;">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="md-form">
                                            <svg class="prefix" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 383 436.063">
                                                <path fill-rule="evenodd" fill="white" d="M166,175H138s-41,1.5-41,41V411s3.5,38,38,38H440s40-8,40-40V216s0-39-39-39c-29-2-31-2-31-2V136S411.788,21.164,289,13c-69.6-2.12-123.4,52.085-124,122C166.212,175.9,166,175,166,175Zm-28,43V408H439V218H138ZM288,53s-78.476-3.631-82,82c0.1,40.3,0,40,0,40H371V134S368.991,54.813,288,53Z" transform="translate(-97 -12.938)"/>
                                            </svg>
                                            <input type="password" name="password" id="password" class="white-text form-control" autocomplete="">
                                            <label for="password">كلمة المرور</label>
                                            @error('password') <div class="text-warning" style="margin-right: 2.5rem;">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="custom-control-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="rememberMe"  id="remember-me" class="custom-control-input">
                                                <label class="custom-control-label" for="remember-me">تذكرني</label>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button class="btn btn-outline-white">
                                                <span>تسجيل دخول</span>
                                                <i class="fa fa-sign-in-alt fa-flip-horizontal mr-1"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services text-center" id="services">
        <div class="container">
            <h2 class="h1-responsive font-weight-bold my-5">الخدمات</h2>
            <p class="lead grey-text mb-5">
                <span>يوفر معهد تراث الانبياء (عليهم السلام) مجموعة من افضل الخدمات لمستخدمينا (زائر، طالب ، مستمع) مع الدعم اليومي المستمر بهدف ايصال علوم محمد وآل بيته (صلوات الله عليهم اجمعين) اليكم، ومن الله التوفيق.</span>
            </p>
            <div class="row">
                <div class="col-md-4 py-md-5 py-4 wow fadeInUp" data-wow-delay="0.3s">
                    {{--<i class="fas fa-book fa-3x green-text"></i>--}}
                    <i class="fas fa-cubes fa-3x green-text"></i>
                    <h5 class="font-weight-bold my-4">الدورات</h5>
                    <p class="grey-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores aperiam minima assumenda deleniti hic.
                    </p>
                </div>
                <div class="col-md-4 py-md-5 py-4 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="far fa-comments fa-3x cyan-text"></i>
                    <h5 class="font-weight-bold my-4">الرسائل</h5>
                    <p class="grey-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores aperiam minima assumenda deleniti hic.
                    </p>
                </div>
                <div class="col-md-4 py-md-5 py-4 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="far fa-bell fa-3x orange-text"></i>
                    <h5 class="font-weight-bold my-4">الاشعارات</h5>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores
                        aperiam minima assumenda deleniti hic.
                    </p>
                </div>
                <div class="col-md-4 py-md-5 py-4 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="far fa-edit fa-3x text-secondary"></i>
                    <h5 class="font-weight-bold my-4">المناقشات ومدونة الكفيل</h5>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                        maiores aperiam minima assumenda deleniti hic.
                    </p>
                </div>
                <div class="col-md-4 py-md-5 py-4 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="fas fa-mobile-alt fa-3x text-default"></i>
                    <i class="fas fa-laptop fa-3x amber-text"></i>
                    <h5 class="font-weight-bold my-4">الاجهزة المتعددة</h5>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                        maiores aperiam minima assumenda deleniti hic.
                    </p>
                </div>
                <div class="col-md-4 py-md-5 py-4 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="far fa-check-circle fa-3x indigo-text"></i>
                    <h5 class="font-weight-bold my-4">الدعم</h5>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores
                        aperiam minima assumenda deleniti hic.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="about turath-gradient-color" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 text-white text-justify wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="h1-responsive font-weight-bold my-5">حول الحوزة</h2>
                    <p class="text-justify">
                        <span>منذ ان حطّ الشيخ الطوسي ( ره ) ركابه في النجف الأشرف عام 448 هـ وحوزة النجف الأشرف تشع بالعطاء العلمي والروحي لكل بقاع الأرض, وطلبتها مازالوا يقتبسون العلوم المختلفة في اللغة العربية والفلسفة والمنطق والفقه والأصول وعلوم القرآن والعقيدة وقد تعارفَ في حوزة النجف على تقسيم الدراسات الى ثلاث مراحل</span>
                    </p>
                    <ol>
                        <li class="mb-3">المقدمات : ويقصدونَ بها دراسة النحو والصرف وعلوم البلاغة والمنطق. ودراسة هذه العلوم في هذه المرحلة تُعتَبر مقدمة للوصول في الدراسات التخصصية في الفقه والأصول.</li>
                        <li class="mb-3">السطوح : ويراد بها دراسة متون الكتب في الفقه الاستدلالي واصول الفقه وقد يضاف اليها علوم اخرى كالفلسفة وعلم الكلام والحديث والتفسير.</li>
                        <p>وهاتان المرحلتان هما اللتان تكونان الطالب وتعدانه للدخول في مرحلة البحث الخارج وقد يستغرق اجتياز الطالب لهما عشر سنين او اكثر.</p>
                        <li class="mb-3">بحث الخارج : في هذه المرحلة يلتقي عدد كبير من الطلاب الذين انهوا المرحلتين حول أحد كبار المجتهدين فيحاضرهم ارتجالاً في الفقه او الأصول ويعرض عليهم المسألة شارحاً لها شرحاً مستفيضاً ، يبرز فيه جيمع الآراء الاسلامية ومذاهبها ،ثم يناقش تلك الآراء مناقشة دقيقة ثم يدلي هو برأية في المسألة عارضاً دليله على ما إرتآه . ومما تمتاز به هذه المرحلة هو اطلاق حرية المناقشة للطالب على اوسع الابواب فترى الطلاب يناقشون الآراء والنظريات مع الأستاذ مناقشة الند للند فيتعودون الثقة باانفسهم والاعتماد على أرائهم . والذي يصغي الى تلك المناقشات يعلم انها فريدة في اسلوب التدريس العلمي بما فيها من حرية وعمق ودقة وبما تنطوي عليه من توجيه رائع وسعة آفاق وتشجيع مما لانحسب له نظيراً في اي تدريس جامعي اخر .</li>
                    </ol>
                </div>

                <div class="col-12 text-white text-justify mt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="h1-responsive font-weight-bold my-5">حول المعهد</h2>
                    <p>
                        <span>بعد التوكل على الله عز وجل وطلب التوفيق منه تم إنشاء معهد تراث الانبياء (عليهم السلام) للدراسات الحوزوية الإلكترونية وقد كان الباعث على إنشاء المعهد وجود طلبات من خارج العراق من النساء والرجال للدراسة في النجف الأشرف وبسبب وجود عوائق عديدة تحول دون ذلك؛ جعلنا هذا المعهد بديلاً عن المجيء وخصوصاً ان اغلب الطلبات كانت من النساء المستبصرات. ان معهد تراث الأنبياء (عليهم السلام) للدراسات الحوزوية الالكترونية ، يُعدّ تجربة رائدة في مجال الدراسات الحوزوية الإلكترونية حيث يقدّم لطلبته من النساء والرجال ومن مختلف أنحاء العالم الدروس الفقهية والعقائدية ودروساً في تفسير القرآن العزيز وأحكام التلاوة والتجويد، وعلوم اللغة العربية والمنطق إضافة الى دورات في فقه النساء ومناسك الحج ، كما يتيح لطلبته الأعزاء توفير جوٍ علمي رائع للمناقشات والمباحثات فيما بينهم وبين الأساتذة .</span>
                    </p>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-outline-white">النظام الداخلي word</a>
                        <a class="btn btn-outline-white">النظام الداخلي pdf</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="contact-us">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-5 mb-lg-0 mb-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card" id="contact-form">
                        @csrf
                        <div class="card-body">
                            <div class="turath-gradient-color px-2 py-3 text-white text-center" style="margin-top: -50px;">
                                <h3 class="mt-2">
                                    <i class="fas fa-envelope"></i>
                                    <span>تواصل معنا</span>
                                </h3>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" name="name" id="name" class="form-control">
                                <label for="name">الاسم</label>
                                <div id="error-name" class="invalid-feedback d-block"></div>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="text" name="email" id="email" class="form-control">
                                <label for="email">البريد الالكتروني</label>
                                <div id="error-email" class="invalid-feedback d-block"></div>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-tag prefix grey-text"></i>
                                <input type="text" name="subject" id="subject" class="form-control">
                                <label for="subject">الموضوع</label>
                                <div id="error-subject" class="invalid-feedback d-block"></div>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-pencil-alt prefix grey-text"></i>
                                <textarea rows="3" name="message" id="message" class="form-control md-textarea"></textarea>
                                <label for="message">الرسالة</label>
                                <div id="error-message" class="invalid-feedback d-block"></div>
                            </div>
                            <div class="text-center">
                                <button class="btn turath-gradient-color" id="btn-contact-us">ارسال</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                    <div id="map-container-section" class="z-depth-1-half map mb-4">
                        <iframe src="https://maps.google.com/maps?q=معهد+تراث+الانبياء&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4 d-sm-block d-flex align-items-baseline">
                            <a class="btn-floating turath-gradient-color">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                            <p>العراق - النجف الاشرف</p>
                        </div>
                        <div class="col-md-4 d-sm-block d-flex align-items-baseline">
                            <a class="btn-floating turath-gradient-color">
                                <i class="fas fa-phone"></i>
                            </a>
                            <p dir="ltr">+964 77 3188 1800</p>
                        </div>
                        <div class="col-md-4 d-sm-block d-flex align-items-baseline">
                            <a class="btn-floating turath-gradient-color">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <p>turath.alanbiaa@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="media">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center wow fadeIn" data-wow-delay="0.3s">
                    <a class="btn-floating my-1 btn-fb" href="https://www.facebook.com/TurathAlanbiaa" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn-floating my-1 btn-tw" href="https://twitter.com/turathalanbiaa" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn-floating my-1 btn-ins" href="https://www.instagram.com/turathalanbiaa/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="btn-floating my-1 btn-yt" href="https://www.youtube.com/channel/UCV0xdl7t1xR44mv1G6cQxEg" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a class="btn-floating my-1 btn-tel" href="https://telegram.me/Turathbot" target="_blank">
                        <i class="fab fa-telegram-plane"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("script")
<script>
    toastr.options = {
        "rtl": true,
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    $("button#btn-contact-us").click(function () {
        let currentBtn = $(this);
        let name =  document.getElementById('name');
        let errorName =  document.getElementById('error-name');
        let email =  document.getElementById('email');
        let errorEmail =  document.getElementById('error-email');
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        let subject =  document.getElementById('subject');
        let errorSubject =  document.getElementById('error-subject');
        let message =  document.getElementById('message');
        let errorMessage =  document.getElementById('error-message');
        let state = true;
        let htmlLoading = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>";

        // reset vars
        errorName.innerHTML = "";
        errorEmail.innerHTML = "";
        errorSubject.innerHTML = "";
        errorMessage.innerHTML = "";
        currentBtn.html(htmlLoading);

        // validation
        if (name.value === "") {
            errorName.innerHTML = "الاسم لا يمكن أن يكون فارغ.";
            state = false;
        }
        if (email.value === "") {
            errorEmail.innerHTML = "البريد الالكتروني لا يمكن أن يكون فارغ.";
            state = false;
        }
        else {
            if(!re.test(email.value)) {
                errorEmail.innerHTML = "تنسيق البريد الإلكتروني غير صالح.";
                state = false;
            }
        }
        if (subject.value === "") {
            errorSubject.innerHTML = "الموضوع لا يمكن أن يكون فارغ.";
            state = false;
        }
        if (message.value === "") {
            errorMessage.innerHTML = "الرسالة لا يمكن أن يكون فارغ.";
            state = false;
        }
        if (state === false)
            setTimeout(function(){ currentBtn.html("ارسال"); }, 250);
        else {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "post",
                url: "/contact-us",
                data: { "name":name.value, "email":email.value, "subject":subject.value, "message":message.value },
                dataType: "json",
                success: function( result ) {
                    if (result === true)
                        toastr["success"]("تم استلام الرسالة.");
                    else
                        toastr["error"]("لم يتم استلام الرسالة.");
                },
                error: function(){
                    toastr["warning"]("حدث خطأ ما اثناء استلام الرسالة، يرجى اعادة المحاولة.");
                },
                complete: function(){
                    name.value = "";
                    email.value = "";
                    subject.value = "";
                    message.value = "";
                    currentBtn.html("ارسال");
                }
            });
        }
    });
</script>
@endsection
