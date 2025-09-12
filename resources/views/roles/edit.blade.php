 <div id="roles-edit" class="mfp-hide large">
            <div class="modal-data">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __("Edit Role") }}</h5>
                </div>
                <div class="modal-form-data">
                    <form class="modal-form" method="POST" action="{{ setRoute('roles.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="id" id="id">
                        <div class="row mb-10-none">
                            <div class="col-xl-12 col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => __('Role')."*",
                                    'name'          => "edit_name",
                                    'placeholder'   => __('Role'),
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
                openModalWhenError("roles-edit","#roles-edit");

                $(document).on("click",".edit-modal-button",function(){
                    var oldData = JSON.parse($(this).parents("tr").attr("data-data"));
                    var editModal = $("#roles-edit");
                    editModal.find("input[name=id]").val(oldData.id);
                    editModal.find("input[name=edit_name]").val(oldData.name);
                    openModalBySelector("#roles-edit");

                });
            </script>
            
        
        @endpush
