
    <div id="roles-add" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add Role') }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('roles.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                            <div class="col-xl-12 col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Name')."*",
                                    'name'          => "name",
                                    'placeholder'   => __('Name'),
                                ])
                            </div>
                        <div
                            class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close">{{ __('cancel') }}</button>
                            <button type="submit" class="btn btn--base">{{ __('Add') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            openModalWhenError("roles-add", "#roles-add");

            function placeRandomPassword(clickedButton, placeInput) {
                $(clickedButton).click(function() {
                    var generateRandomPassword = makeRandomString(10);
                    $(placeInput).val(generateRandomPassword);
                });
            }
            placeRandomPassword(".rand_password_generator", ".place_random_password");
        </script>
       
    @endpush
