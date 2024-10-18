@extends('base')

<title>Contact</title>

@push('styles')
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <script src="{{ asset('js/javascript.js') }}"></script>
@endpush

@section('body')
    <div class="container">
        <h1 class="contact-titel">Contact</h1>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <form class="form-horizontal" method="POST" action="{{ route('submit.captcha') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('naam') ? ' has-error' : '' }}">
                            <h3 for="naam" class="control-label">Naam</h3>

                            <div class="col-md-12">
                                <input id="naam" type="text" class="form-control" name="naam"
                                    value="{{ old('naam') }}">

                                @if ($errors->has('naam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('naam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <h3 for="email" class="control-label">E-Mail Adres</h3>

                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" name="email"
                                    value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefoonnummer') ? ' has-error' : '' }}">
                            <h3 for="telefoonnummer" class="control-label">Telefoonnummer</h3>

                            <div class="col-md-12">
                                <input id="telefoonnummer" type="text" class="form-control" name="telefoonnummer"
                                    value="{{ old('telefoonnummer') }}">
                                <div class="concact-Telfoonnummer-check">
                                    <input type="checkbox">
                                    <h6>Wilt u gebeld worden?</h6>
                                </div>

                                @if ($errors->has('Telfoonnummer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Telfoonnummer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Onderwerp') ? ' has-error' : '' }}">
                            <h3 for="Onderwerp" class="control-label">Onderwerp</h3>

                            <div class="col-md-12">
                                <div class="contact-select-arrow">
                                    <select id="Onderwerp" class="form-control contact-onderwerp-dropdown" name="Onderwerp">
                                        <option>Informatie</option>
                                        <option>Klachten</option>
                                        <option>Solliciteren</option>
                                        <option>Overige vragen</option>
                                    </select>
                                    <span class="select-arrow"><i class="fas fa-chevron-down"></i></span>
                                </div>

                                @if ($errors->has('Onderwerp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Onderwerp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vraag') ? ' has-error' : '' }}">
                            <h3 for="vraag" class="control-label">Vraag</h3>

                            <div class="col-md-12">
                                <textarea id="vraag" type="text" class="form-control form-control-vraag" name="vraag"
                                    value="{{ old('vraag') }}"></textarea>

                                @if ($errors->has('vraag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vraag') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="captcha">
                                    <span>{!! captcha_img() !!}</span>
                                </div>
                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha"
                                    name="captcha">
                                @if ($errors->has('captcha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 contact-block-button">
                                <button type="submit" class="contact-button">
                                    Versturen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6 contact-flex">
                <div class="contact-padding">
                    <span class="body-XXL">Openingstijden</span>
                    <div class="body-XXL">
                        <ul class="contact-Openingstijden-list">
                            <li>Maandag: Gesloten</li>
                            <li>Dinsdag: 09:00 - 18:00 uur</li>
                            <li>Woensdag: 09:00 - 18:00 uur</li>
                            <li>Donderdag: 09:00 - 21:00 uur</li>
                            <li>Vrijdag: 09:00 - 18:00 uur</li>
                            <li>Zaterdag: 09:00 - 17:00 uur</li>
                            <li>Zondag: 09:00 - 17:00 uur</li>
                        </ul>
                    </div>
                </div>
                <div class="contact-inf-block">
                    <iframe class="contact-iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.555348224422!2d5.493734776548427!3d51.46631987180399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6d8d3f3dacee7%3A0x1acd712bb57b8792!2sSterrenlaan%2010%2C%205631%20KA%20Eindhoven!5e0!3m2!1snl!2snl!4v1718355605675!5m2!1snl!2snl"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>


                <div>

                </div>

            </div>
        </div>
    </div>
@endsection
