<div class="tab-pane fade" id="account-settings" role="tabpanel">
    <div class="myaccount-content">
        <h3 style="color: #14287B;"><i class="fa fa-user-cog"></i> {{ translating('account-settings') }}</h3>

        <div class="account-details-form">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <label class="w-100 hov-pointer">
                        <form id="updateImageForm" enctype="multipart/form-data" action="{{ route('change-image', ['locale' => app()->getLocale()]) }}" method="post">
                            @csrf
                            <input onchange="updateImageForm.submit()" form="updateImageForm" name="img" class="d-none" required type="file">
                        </form>
                        <img src="{{ $image_path }}/users/{{ Auth::user()->img }}" class="responsive w-100 rounded" alt="{{ Auth::user()->name }}">
                        <span class="btn btn-base btn-sm mt-3 w-100"><i class="fa fa-redo"></i> {{ translating('udpate') }}</span>
                    </label>
                </div>
                <form class="w-100" data-success="{{ translating('account-main-data-change-success') }}" data-error="{{ translating('account-main-data-change-error') }}" action="{{ route('change-account-data', ['locale' => app()->getLocale()]) }}" method="post" id="updateMainDataForm">
                @csrf
                    <div class="row">
                    	<div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold">{{ translating('donnees-personnelles') }}</label>
                    	</div>

                        <div class="col-12 mb-3">
                            <input form="updateMainDataForm" name="name" value="{{ Auth::user()->name }}" required min="1" max="255" placeholder="{{ translating('name') }}" type="text">
                        </div>

                        <div class="col-12 mb-3">
                            <input form="updateMainDataForm" name="job_title" value="{{ Auth::user()->job_title }}" required min="1" max="255" placeholder="{{ translating('job_title') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateMainDataForm" name="email" value="{{ Auth::user()->email }}" required min="1" max="255" placeholder="{{ translating('email-address') }}" type="email">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateMainDataForm" name="phone" value="{{ Auth::user()->phone }}" required min="1" max="255" placeholder="{{ translating('phone') }}" type="text">
                        </div>

                        <div class="col-12 mb-3">
                            <button type="submit" form="updateMainDataForm" class="btn btn-base">{{ translating('save-changes') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="account-details-form">
            <div class="row">
                <form class="w-100" data-success="{{ translating('account-secondary-data-change-success') }}" data-error="{{ translating('account-secondary-data-change-error') }}" action="{{ route('change-account-secondary-data', ['locale' => app()->getLocale()]) }}" method="post" id="updateSecondaryDataForm">
                @csrf
                    <div class="row">
                    	<div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold">{{ translating('lieu-de-naissance') }}</label>
                    	</div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="nationality" value="{{ Auth::user()->options['nationality'] }}" min="1" max="255" placeholder="{{ translating('nationality') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="from" value="{{ Auth::user()->options['from'] }}" min="1" max="255" placeholder="{{ translating('from') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="gender" value="{{ Auth::user()->options['gender'] }}" min="1" max="255" placeholder="{{ translating('gender') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="birth_day" value="{{ Auth::user()->options['birth_day'] }}" min="1" max="255" placeholder="{{ translating('birth_day') }}" type="text">
                        </div>

                        <div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold">{{ translating('siege') }}</label>
                    	</div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="province" value="{{ Auth::user()->options['province'] }}" min="1" max="255" placeholder="{{ translating('province') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="address" value="{{ Auth::user()->options['address'] }}" min="1" max="255" placeholder="{{ translating('address') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="emplesment" value="{{ Auth::user()->options['emplesment'] }}" min="1" max="255" placeholder="{{ translating('emplesment') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="civique" value="{{ Auth::user()->options['civique'] }}" min="1" max="255" placeholder="{{ translating('civique') }}" type="text">
                        </div>

                        <div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold">{{ translating('donnees-d-entreprise') }}</label>
                    	</div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="group_name" value="{{ Auth::user()->options['group_name'] }}" min="1" max="255" placeholder="{{ translating('group_name') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="jordique" value="{{ Auth::user()->options['jordique'] }}" min="1" max="255" placeholder="{{ translating('jordique') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="address_pec" value="{{ Auth::user()->options['address_pec'] }}" min="1" max="255" placeholder="{{ translating('address_pec') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="social_card_number" value="{{ Auth::user()->options['social_card_number'] }}" min="1" max="255" placeholder="{{ translating('social_card_number') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="tva_number" value="{{ Auth::user()->options['tva_number'] }}" min="1" max="255" placeholder="{{ translating('tva_number') }}" type="text">
                        </div>

                        <div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold">{{ translating('type-de-document') }}</label>
                    	</div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="document_type" value="{{ Auth::user()->options['document_type'] }}" min="1" max="255" placeholder="{{ translating('document_type') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="document_number" value="{{ Auth::user()->options['document_number'] }}" min="1" max="255" placeholder="{{ translating('document_number') }}" type="text">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <input form="updateSecondaryDataForm" name="date_expiration" value="{{ Auth::user()->options['date_expiration'] }}" min="1" max="255" placeholder="{{ translating('date_expiration') }}" type="text">
                        </div>

                        <div class="col-12 mb-3">
                            <button type="submit" form="updateSecondaryDataForm" class="btn btn-base">{{ translating('save-changes') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="account-details-form">
            <div class="row">
                <form class="w-100" data-success="{{ translating('account-secondary-data-docs-change-success') }}" data-error="{{ translating('account-secondary-data-docs-change-error') }}" action="{{ route('change-account-secondary-data-docs', ['locale' => app()->getLocale()]) }}" method="post" enctype="multipart/form-data" id="updateSecondaryDataFormDocs">
                @csrf
                    <div class="row">
                        <div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold"><i class="fa fa-file-pdf"></i> {{ translating('a-document-d-identite') }}</label>
                    	</div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('document_indentie') }}</label>
                            @if(isset(Auth::user()->docs['document_indentie']) && Auth::user()->docs['document_indentie'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => Auth::user()->docs['id'], 'file' => 'document_indentie']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input form="updateSecondaryDataFormDocs" name="document_indentie"  type="file">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('doc_retro') }}</label>
                            @if(isset(Auth::user()->docs['doc_retro']) && Auth::user()->docs['doc_retro'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => Auth::user()->docs['id'], 'file' => 'doc_retro']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input form="updateSecondaryDataFormDocs" name="doc_retro"  type="file">
                        </div>

                        <div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold"><i class="fa fa-file-pdf"></i> {{ translating('b-extrait-kbis') }}</label>
                    	</div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('extrait_kbis_doc') }}</label>
                            <input form="updateSecondaryDataFormDocs" name="extrait_kbis_doc"  type="file" value="{{ Auth::user()->docs['extrait_kbis_doc'] }}">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('n_extrais_doc') }}</label>
                            @if(isset(Auth::user()->docs['n_extrais_doc']) && Auth::user()->docs['n_extrais_doc'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => Auth::user()->docs['id'], 'file' => 'n_extrais_doc']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input form="updateSecondaryDataFormDocs" name="n_extrais_doc"  type="file">
                        </div>

                        <div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold"><i class="fa fa-file-pdf"></i> {{ translating('c-assurance') }}</label>
                    	</div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('n_assurance') }}</label>
                            <input form="updateSecondaryDataFormDocs" name="n_assurance"  type="text" value="{{ Auth::user()->docs['n_assurance'] }}">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('d_license_doc') }}</label>
                            @if(isset(Auth::user()->docs['d_license_doc']) && Auth::user()->docs['d_license_doc'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => Auth::user()->docs['id'], 'file' => 'd_license_doc']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input form="updateSecondaryDataFormDocs" name="d_license_doc"  type="file">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('date_experation') }}</label>
                            <input form="updateSecondaryDataFormDocs" name="date_experation"  value="{{ Auth::user()->docs['date_experation'] }}" type="text">
                        </div>

                        <div class="col-12">
	                    	<label class="w-100 d-block text-dark font-weight-bold"><i class="fa fa-file-pdf"></i> {{ translating('d-licence') }}</label>
                    	</div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('d_n_license') }}</label>
                            @if(isset(Auth::user()->docs['d_n_license']) && Auth::user()->docs['d_n_license'] != null)
                                <a href="{{ route('download-data', ['locale' => app()->getLocale(), 'id' => Auth::user()->docs['id'], 'file' => 'd_n_license']) }}" class="text-primary">{{ translating('download') }}</a>
                            @endif
                            <input form="updateSecondaryDataFormDocs" name="d_n_license"  type="file">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="w-100 d-block">{{ translating('n_license') }}</label>
                            <input form="updateSecondaryDataFormDocs" name="n_license"  value="{{ Auth::user()->docs['n_license'] }}" type="text">
                        </div>

                        <div class="col-12 mb-3">
                            <button type="submit" form="updateSecondaryDataFormDocs" class="btn btn-base">{{ translating('save-changes') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @auth
            @if(Auth::user()->type != 'user_by_facebook')
                <div class="account-details-form mt-5">
                    <form action="{{ route('account-change', ['locale' => app()->getLocale()]) }}" method="post" id="updatePasswordForm">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4><i class="fa fa-unlock-alt"></i> {{ translating('password-change') }}</h4>
                            </div>

                            <div class="col-12 mb-3">
                                <input form="updatePasswordForm" min="1" max="255" name="old_password" required placeholder="{{ translating('curent-password') }}" type="password">
                            </div>

                            <div class="col-lg-6 col-12 mb-3">
                                <input form="updatePasswordForm" min="1" max="8" name="new_password" required placeholder="{{ translating('new-password') }}" type="password">
                            </div>

                            <div class="col-lg-6 col-12 mb-3">
                                <input form="updatePasswordForm" min="1" max="8" name="new_password_confirm" required placeholder="{{ translating('confirm-password') }}" type="password">
                            </div>

                            <div class="col-12">
                                <button type="submit" form="updatePasswordForm" class="btn btn-base">{{ translating('change-password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</div>