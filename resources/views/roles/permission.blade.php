 <div id="roles-permission" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __("Edit Role") }}</h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="{{ setRoute('roles.permission') }}" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="id" id="id">
                        <div class="row mb-10-none">
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('User'),
                                    'name'          => "users",
                                    'placeholder'   => __('User'),
                                    'id'            => "users",
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Role'),
                                    'name'          => "roles",
                                    'id'            => "roles",
                                    'placeholder'   => __('Role'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Pendaftaran'),
                                    'name'          => "pendaftaran",
                                    'id'            => "pendaftaran",
                                    'placeholder'   => __('Pendaftaran'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Umum'),
                                    'name'          => "umum",
                                    'id'            => "umum",
                                    'placeholder'   => __('Umum'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Anak'),
                                    'name'          => "anak",
                                    'id'            => "anak",
                                    'placeholder'   => __('Anak'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Gigi & Mulut'),
                                    'name'          => "gigi_mulut",
                                    'id'            => "gigi_mulut",
                                    'placeholder'   => __('Gigi & Mulut'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Obgyn'),
                                    'name'          => "obgyn",
                                    'id'            => "obgyn",
                                    'placeholder'   => __('Obgyn'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Penyakit Dalam'),
                                    'name'          => "penyakit_dalam",
                                    'id'            => "penyakit_dalam",
                                    'placeholder'   => __('Penyakit Dalam'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Saraf'),
                                    'name'          => "saraf",
                                    'id'            => "saraf",
                                    'placeholder'   => __('Saraf'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Telinga, Hidung, Tenggorokan (THT)'),
                                    'name'          => "tht",
                                    'id'            => "tht",
                                    'placeholder'   => __('Telinga, Hidung, Tenggorokan (THT)'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Jantung'),
                                    'name'          => "jantung",
                                    'id'            => "jantung",
                                    'placeholder'   => __('Jantung'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Mata'),
                                    'name'          => "mata",
                                    'id'            => "mata",
                                    'placeholder'   => __('Mata'),
                                    'type'          => "checkbox",
                                    'value'         => "1"
                                ])
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                                <button type="button" class="btn btn--danger modal-close">{{ __("cancel") }}</button>
                                <button type="submit" class="btn btn--base">{{ __("update") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push("script")
            <script>
                openModalWhenError("roles-permission","#roles-permission");

                $(document).on("click",".permission-modal-button",function(){
                    var oldData = JSON.parse($(this).parents("tr").attr("data-data"));
                    var editModal = $("#roles-permission");
                    var permission = oldData.permission;
                    permission.forEach((role, index) => {
                        document.getElementById(role).checked = true;
                    });
                    editModal.find("input[name=id]").val(oldData.id);
                    openModalBySelector("#roles-permission");

                });
            </script>
            
        
        @endpush
