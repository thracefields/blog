@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">КОНТАКТИ</div>

                <div class="card-body">
                    <h2>Ако има нещо, звънкайте на 08888888 ;)</h2>
                </div>
            </div>
            <div class="card mt4" style="margin-top: 30px;">
                <div class="card-header">КодаПравиш</div>

                <div class="card-body">
                    <p>code code code</p>
                </div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed sint voluptates ullam, dicta voluptatum velit similique tempore mollitia iure laudantium libero debitis? Molestias consectetur dicta, nihil corporis amet et officia!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi tempore, repellendus ducimus eos placeat cupiditate optio neque natus. Voluptatem, eligendi. Iure consequuntur vitae quos, veritatis deleniti explicabo voluptas rerum nostrum.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse incidunt quisquam, voluptas deleniti asperiores rerum quas deserunt repudiandae maiores unde? Aperiam ad voluptates perspiciatis? Et odio dignissimos quos nam delectus!
            </div>
            <div style="border: 1px solid red; margin: 20px; padding: 50px; font-size: 40px; color: red; text-align: center;">Контакти! На линия 24/7</div>
            <div class="card mt4" style="margin-top: 30px;">
                <div class="card-header">Пиши ни</div>

                <div class="card-body">
                    <div class="container contact-form">
                        <div class="contact-image">
                            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
                        </div>
                        <form method="post">
                            <h3>Drop Us a Message</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection