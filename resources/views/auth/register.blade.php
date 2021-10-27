@extends('Layouts.User')

<!-- For active -->
@php $page='register'; @endphp

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger">{{ __('Champadev') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-4">
                            <div class="mb-3">
                                <div class="h3">ສ້າງບັນສະມາຊິກ </div>
                                <div class="form-text">ເພື່ອເປັນສ່ວນໜຶ່ງ ໃນການພັດທະນາໄປສູ່ຄວາມສຳເລັດ</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3 col-md-2">
                                <label for="">ເພດ</label>
                            </div>
                            <div class="col-3 col-md-1 mb-3 ">
                                <input class="form-check-input" type="radio" name="Gender" value="ຍິງ">
                                <label class="form-check-label" for="Gender"> ຍິງ </label>
                            </div>

                            <div class="col-3 col-md-1 mb-3 ">
                                <input class="form-check-input" type="radio" name="Gender" value="ຊາຍ">
                                <label class="form-check-label" for="Gender"> ຊາຍ</label>
                            </div>

                            <div class="col-3 col-md-1 mb-3 ">
                                <input class="form-check-input" type="radio" name="Gender" value="null">
                                <label class="form-check-label" for="Gender"> ບໍ່ລະບຸ </label>
                            </div>
                            @error('Gender')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="FirstName" class="form-text">{{ __('ຊື່') }}</label>
                                <input id="FirstName" type="text" name="FirstName"
                                    value="{{ old('FirstName')?? 'Male' }}"
                                    class="form-control @error('FirstName')  is-invalid @enderror"
                                    autocomplete="FirstName">
                                @error('FirstName')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="LastName" class="form-text">{{ __('ນາມສະກຸນ') }}</label>
                                <input type="text" name="LastName" value="{{ old('LastName')?? 'Male' }}"
                                    class="form-control @error('LastName')  is-invalid @enderror">
                                @error('LastName')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="BirthDay" class="form-text">{{ __('ວັນ ເດືອນ ປີ ເກີດ') }}</label>
                                <input type="date" name="BirthDay"
                                    class=" form-control @error('BirthDay')  is-invalid @enderror">
                                @error('BirthDay')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="col-12 col-md-6 mb-3">
                                <label for="NickName" class="form-text">{{ __('ຊື່ຫຼິ້ນ') }}</label>
                                <input type="text" name="NickName" value="{{ old('NickName')?? 'Male' }}"
                                    class="form-control @error('NickName')  is-invalid @enderror">
                                @error('NickName')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="mt-5 text-primary pt-4 border-top h3">ຂໍ້ມູນທີ່ໃຊ້ເຂົ້າສູ່ລະບົບ</div>
                            <div class="col-12  mb-3">
                                <label for="Tel" class="form-text">{{ __('ເບີໂທ') }}</label>
                                <input type="number" min="0" name="Tel" value="{{ old('Tel')?? '2091116465' }}"
                                    class="form-control @error('Tel')  is-invalid @enderror" placeholder="20 xxxx xxxx">
                                @error('Tel')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="password" class="form-text">{{ __('ລະຫັດຜ່ານ') }}</label>
                                <input type="password" name="password" value="{{ old('password')?? '11112222' }}"
                                    class="form-control @error('password')  is-invalid @enderror">
                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="col-6 mb-3">
                                <label for="password" class="form-text">{{ __('ຢືນຢັນ ລະຫັດຜ່ານ') }}</label>
                                <input type="password" name="password_confirmation"
                                    value="{{ old('password')?? '11112222' }}"
                                    class="form-control @error('password')  is-invalid @enderror">
                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="mt-5 text-primary pt-4 border-top h3">ຂໍ້ມູນຕິດຕໍ່</div>

                            <div class="col-12 col-md-4 mb-3">
                                <label for="Whatsapp" class="form-text">{{ __('Whatsapp') }}</label>
                                <input type="number" min="2" name="Whatsapp"
                                    value="{{ old('Whatsapp')?? '2091111234' }}"
                                    class="form-control @error('Whatsapp')  is-invalid @enderror">
                                @error('Whatsapp')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="col-12 col-md-4 mb-3">
                                <label for="Wechat" class="form-text">{{ __('Wechat') }}</label>
                                <input type="number" min="0" name="Wechat" value="{{ old('Wechat')?? '2091111234' }}"
                                    class="form-control @error('Wechat')  is-invalid @enderror">
                                @error('Wechat')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="col-12 col-md-4 mb-3">
                                <label for="Facebook" class="form-text">{{ __('Facebook') }}</label>
                                <input type="text" name="Facebook" value="{{ old('Facebook')?? 'Facebook' }}"
                                    class="form-control @error('Facebook')  is-invalid @enderror">
                                @error('Facebook')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="mt-5 text-primary pt-4 border-top h4">ຂໍ້ມູນທີ່ຢູ່</div>

                            <div class="col-12 col-md-4 mb-3">
                                <label for="Village" class="form-text">{{ __('ບ້ານ') }}</label>
                                <input type="text" name="Village" value="{{ old('Village')?? 'Village' }}"
                                    class="form-control @error('Village')  is-invalid @enderror">
                                @error('Village')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="col-12 col-md-4 mb-3">
                                <label for="District" class="form-text">{{ __('ເມືອງ') }}</label>
                                <input type="text" name="District" value="{{ old('District')?? 'Male' }}"
                                    class="form-control @error('District')  is-invalid @enderror">
                                @error('District')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="col-12 col-md-4 mb-3">
                                <label for="Province" class="form-text">{{ __('ແຂວງ') }}</label>
                                <input type="text" name="Province" value="{{ old('Province')?? 'Male' }}"
                                    class="form-control @error('Province')  is-invalid @enderror">
                                @error('Province')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-6 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ສະໝັກສະມາຊິກ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
