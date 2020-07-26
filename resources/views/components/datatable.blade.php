@props(['id', 'print', 'cols', 'header', 'footer', 'orderCol', 'orderDir'])
<script>
    $(function () {
        $("#{{$id}}").DataTable({
            "order": [{{$orderCol ?? '0'}}, "{{$orderDir ?? 'asc'}}"],
            "language": {
                "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                "oAria": {
                    "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            }, "info": false,
            @if($print)
            dom: 'Bfrtip',
            lengthMenu: [[10, 25, 50, 100 - 1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: {{$cols}},
                    },
                    customize: function (win) {
                        $(win.document.body).find('h1').text('');
                        $(win.document.body).find('h1').append(`
                        <div class="row m-5">
                            <div class="col-12 text-center">
                                 <img style="width:200px;height:200px;" src="{{asset(\App\Setting::MainSettings()->logo)}}">
                            </div>
                        </div>
                        `);
                        $(win.document.body).find('h1').append(`{!! \App\Setting::MainSettings()->header !!}`);
                        $(win.document.body).find('table').after(`{!! \App\Setting::MainSettings()->footer !!}`);
                        $(win.document.body).find('table').addClass('mt-5 mb-5');

                    }
                },
                'pageLength'
            ],
            @endif


        });
    });
</script>
<style>
    #{{$id}}_filter {
        float: left;
    }
</style>
