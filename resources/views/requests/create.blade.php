@extends('layouts.app')

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>Request Information</h2>
            <hr>
            <div class="card">
                <div class="card-header">{{ __('Add Information') }}</div>

                <div class="card-body">
                    <form id="createRequestForm" method="POST" action="{{ route('requests.store') }}" novalidate="true">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6 mt-2">
                                <input type="radio" id="male" name="gender" value="male" checked>
                                <label for="male">Male</label>&nbsp;&nbsp;
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Female</label>&nbsp;&nbsp;
                                <input type="radio" id="other" name="gender" value="other">
                                <label for="other">Other</label>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input class="form-control @error('age') is-invalid @enderror" type="number"  name="age" value="{{ old('age') }}" required autocomplete="age" autofocus/>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="blood_group" class="col-md-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>

                            <div class="col-md-6 mt-2">
                                <input type="radio" name="blood_group" value="O+" checked>
                                <label>O+</label>&nbsp;&nbsp;
                                <input type="radio" name="blood_group" value="O-">
                                <label>O-</label>&nbsp;&nbsp;
                                <input type="radio" name="blood_group" value="A+">
                                <label>A+</label>&nbsp;&nbsp;
                                <input type="radio" name="blood_group" value="A-">
                                <label>A-</label>&nbsp;&nbsp;
                                <input type="radio" name="blood_group" value="B+">
                                <label>B+</label>&nbsp;&nbsp;
                                <input type="radio" name="blood_group" value="B-">
                                <label>B-</label>&nbsp;&nbsp;
                                <input type="radio" name="blood_group" value="AB+">
                                <label>AB+</label>
                                <input type="radio" name="blood_group" value="AB-">
                                <label>AB-</label>

                                @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="positive_date" class="col-md-4 col-form-label text-md-right">{{ __('Date of Covid-19 positive') }}</label>

                            <div class="col-md-6">
                                <input class="form-control @error('positive_date') is-invalid @enderror" type="date" name="positive_date" value="{{ old('positive_date') }}" required autocomplete="positive_date" autofocus/>

                                @error('positive_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="negative_date" class="col-md-4 col-form-label text-md-right">{{ __('Date of Covid-19 negative') }}</label>

                            <div class="col-md-6">
                                <input class="form-control @error('negative_date') is-invalid @enderror" type="date" name="negative_date" value="{{ old('negative_date') }}" required autocomplete="negative_date" autofocus/>

                                @error('negative_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <select id="state-dropdown" class="form-control @error('state') is-invalid @enderror" name="state" required autocomplete="state" autofocus>
                                    <option value="">--Choose state option--</option>
                                    @foreach($states as $key => $value)
                                    <option value="{{ $value->city_state }}">{{ $value->city_state }}</option>
                                    @endforeach
                                </select>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select id="city-dropdown" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="city" autofocus>
                                    <option value="">--Choose city option--</option>
                                </select>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input class="form-control @error('phone_number') is-invalid @enderror" type="number" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus minlength="10" />

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="createRequestBtn" type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $('#state-dropdown').on('change', function() {
        var state_id = this.value;
        // console.log(state_id.city_state);
        $("#city-dropdown").html('');
        $.ajax({
            url:"{{url('get-cities-by-state')}}",
            type: "POST",
            data: {
                state_id: state_id,
                _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                console.log(result);
                $('#city-dropdown').html('<option value="">--Select City--</option>'); 
                $.each(result.cities,function(key,value){
                    $("#city-dropdown").append('<option value="'+value.city_name+'">'+value.city_name+'</option>');
                });
            }
        });
    });


    $(document).ready(function () {

        // $.validator.addMethod("name", function(value, element) {
        //     return this.optional(element) || /^[^\s][a-z\sA-Z\s0-9\s-()][^\s$]/.test(value);
        // }, "Please enter a valid name.");


        $("#createRequestForm").submit(function(e) {
            e.preventDefault();
        }).validate({ // initialize the plugin
            rules: {
                name: {
                    required: true,
                    // name: true
                },
                gender: {
                    required: true
                },
                age: {
                    required: true,
                    min: 18,
                    max: 60
                },
                positive_date: {
                    required: true
                },
                negative_date: {
                    required: true
                },
                state: {
                    required: true
                },
                city: {
                    required:true
                },
                phone_number: {
                    required: true
                }
                
            },
            messages: {
                    name: {
                          required: "Name is required."
                    },
                    age: {
                        required:  "Age is required.",
                        min: "Please enter age between 18 to 60",
                        max: "Please enter age between 18 to 60"
                    },
                    positive_date: {
                        required:  "Covid 19 positive date is required."
                    },
                    negative_date: {
                        required:  "Covid 19 negative date is required."
                    },
                    state: {
                        required:  "State is required."
                    },
                    city: {
                        required: "City is required."
                    },
                    phone_number: {
                        required:  "Phone number is required.",
                        minlength: "Please enter at least 10 digit number"
                    }
            },
            submitHandler: function (form) {
                // console.log('test');
                $('#createRequestBtn').attr('disabled', 'disabled');
                form.submit();
            }

        });
    });
</script>
@endsection
