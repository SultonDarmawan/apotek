<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });

</script>
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@switch($page_name)

@case('dashboard')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 50, 100],
        "pageLength": 5
    });

</script>

@break

@case('kategori')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [10, 25, 50, 100],
        "pageLength": 10
    });

</script>
@break

@case('obat')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [10, 25, 50, 100],
        "pageLength": 10
    });

</script>
@break

@case('supplier')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [10, 25, 50, 100],
        "pageLength": 10
    });

</script>
@break

@case('obat-expired')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [10, 25, 50, 100],
        "pageLength": 10
    });

</script>
@break

@case('pembelian')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script>
    $(document).ready(function () {
        hideButton()
        $('.sidebarCollapse').click();
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 25, 50],
            "pageLength": 5
        });

        $(document).on('click', '.tambah_obat', function (e) {
            e.preventDefault();
            const obat = $(this);
            const id = obat.data('id');
            const nama = obat.data('nama');
            const harga = obat.data('harga');
            const cek = $('input#jumlah-' + id);
            Snackbar.show({
                text: `Obat ${nama} berhasil ditambahkan`,
                pos: 'top-right',
                showAction: false,
                actionTextColor: '#fff',
                backgroundColor: '#4361ee',
            });

            if (cek.length) {
                cek.val(parseInt(cek.val()) + 1);
                $('#jumlah-' + id).change();
            } else {
                const item = `
            <tr data-id="${id}">
                <td>
                    ${nama}
                    <input type="hidden" name="obat_id[]" value="${id}">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm harga-obat" value="${harga}" id="harga_beli-${id}" name="harga_beli[]" required value="0" min="1">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm jumlah-obat" required value="1" min="1" name="jumlah_beli[]" id="jumlah-${id}">
                </td>
                <td>
                    <input type="date" class="form-control form-control-sm tanggal-expire" name="tanggal_expire[]" id="tanggal-expire-${id}">

                </td>
                <td>
                    <span class="total" data-total="0" id="total-${id}">0</span>
                </td>
                <td class="text-center">
                    <a href="javascript:void(0);" class="hapus-detail" data-toggle="tooltip" data-placement="top"
                                title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                        </a>
                </td>
            </tr>
            `;
                $("#list-detail").append(item);
                $('#harga_beli-' + id).change();
                $('#harga_beli-' + id).focus();

                // set default value tanggal-expire to date next year
                const date = new Date();
                const nextYear = date.getFullYear() + 1;
                const nextMonth = ("0" + (date.getMonth() + 1)).slice(-2);
                const nextDay = ("0" + date.getDate()).slice(-2)
                const nextDate = nextYear + '-' + nextMonth + '-' + nextDay;
                $('#tanggal-expire-' + id).val(nextDate);
            }
            hideButton();
        });

        $(document).on('click', '.hapus-detail', function () {
            $(this).closest('tr').remove();
            const nama = $(this).closest('tr').find('td:first-child').text();
            Snackbar.show({
                text: `Obat ${nama} berhasil dihapus`,
                pos: 'top-right',
                showAction: false,
                actionTextColor: '#fff',
                backgroundColor: '#3b3f5c'
            });
            grandTotal();
            hideButton();
        });

        $(document).on('change keyup', '.jumlah-obat', function () {
            const b = $(this);
            const parent = b.closest('tr');
            const id = parent.data('id');
            const harga = parent.find('[type="number"].harga-obat')[0].value;
            const jumlah = b.val();
            const total = harga * jumlah;
            parent.find('.total').data('total', total);
            parent.find('.total').html(formatRupiah(total + '', 'Rp'));
            grandTotal();
        });

        $(document).on('change keyup', '.harga-obat', function () {
            const b = $(this);
            const parent = b.closest('tr');
            const id = parent.data('id');
            const harga = b.val();
            const jumlah = parent.find('.jumlah-obat').val();
            const total = harga * jumlah;
            parent.find('.total').data('total', total);
            parent.find('.total').html(formatRupiah(total + '', 'Rp'));
            grandTotal();
        });

        // check tanggal expire obat
        $(document).on('click', '#save', function () {
            var tanggal_expire = $('.tanggal-expire');
            for (let i = 0; i < tanggal_expire.length; i++) {
                const tanggal = tanggal_expire[i].value;
                console.log(tanggal);
                if (tanggal <= new Date().toISOString().slice(0, 10)) {
                    if (confirm('Obat yang dibeli ada yang expired, yakin ingin melanjutkan?')) {
                        $('#form-transaksi').submit();
                    } else {
                        tanggal_expire[i].focus();
                        return false;
                    }
                }
            }
        });

        function grandTotal() {
            var grandTotal = 0;
            $(".total").each((i, e) => {
                grandTotal += parseInt($(e).data('total'));
            });
            $("#grand-total").html(formatRupiah(grandTotal + '', 'Rp'));
            $('#bayar').change();
        }

        function hideButton() {
            if ($('#list-detail tr').length == 0) {
                $('#save').hide();
            } else {
                $('#save').show();
            }
        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
        }
    });

</script>
@break

@case('penjualan')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script>
    $(document).ready(function () {
        hideButton()

        $('.sidebarCollapse').click();
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 25, 50],
            "pageLength": 5
        });

        $(document).on('click', '.tambah_obat', function (e) {
            e.preventDefault();
            const obat = $(this);
            const id = obat.data('id');
            const nama = obat.data('nama');
            const harga = obat.data('harga');
            const stok = obat.data('stok');
            const cek = $('input#jumlah-' + id);

            if (stok <= 0) {
                alert(`Stok obat ${nama} habis`);
                return false;
            }

            Snackbar.show({
                text: `Obat ${nama} berhasil ditambahkan`,
                pos: 'top-right',
                showAction: false,
                actionTextColor: '#fff',
                backgroundColor: '#4361ee',
            });

            if (cek.length) {
                cek.val(parseInt(cek.val()) + 1);
                $('#jumlah-' + id).change();
            } else {
                const item = `
            <tr data-id="${id}">
                <td>
                    ${nama}
                    <input type="hidden" name="obat_id[]" value="${id}">
                </td>
                <td>
                    <span class="harga" data-harga="${harga}" id="harga-${id}">${formatRupiah(harga + '', 'Rp')}</span>
                    <input type="hidden" name="harga[]" value="${harga}">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm jumlah-obat" required value="1" min="1" max="${stok}" name="jumlah[]" id="jumlah-${id}">
                </td>
                <td>
                    <span class="total" data-total="0" id="total-${id}">${formatRupiah(harga + '', 'Rp')}</span>
                </td>
                <td class="text-center">
                    <a href="javascript:void(0);" class="hapus-detail" data-toggle="tooltip" data-placement="top"
                                title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                        </a>
                </td>
            </tr>
            `;
                $("#list-detail").append(item);
                $('#jumlah-' + id).change();
                $('#jumlah-' + id).focus();
            }
            hideButton();
        });

        $(document).on('click', '.hapus-detail', function () {
            $(this).closest('tr').remove();
            const nama = $(this).closest('tr').find('td:first-child').text();
            Snackbar.show({
                text: `Obat ${nama} berhasil dihapus`,
                pos: 'top-right',
                showAction: false,
                actionTextColor: '#fff',
                backgroundColor: '#3b3f5c'
            });
            grandTotal();
            hideButton();
            $('#bayar').val('');
        });

        $(document).on('change keyup', '.jumlah-obat', function () {
            const b = $(this);
            const parent = b.closest('tr');
            const id = parent.data('id');
            const harga = parseInt(parent.find('.harga').data('harga'));
            const jumlah = b.val();
            const total = harga * jumlah;
            parent.find('.total').data('total', total);
            parent.find('.total').html(formatRupiah(total + '', 'Rp'));
            grandTotal();
        });

        function grandTotal() {
            var grandTotal = 0;
            $(".total").each((i, e) => {
                grandTotal += parseInt($(e).data('total'));
            });
            $("#grand-total").html(formatRupiah(grandTotal + '', 'Rp'));
            $('#bayar').change();
            validateBayar();
        }

        function hideButton() {
            if ($('#list-detail tr').length == 0) {
                $('#save').hide();
            } else {
                $('#save').show();
            }
        }

        function validateBayar() {
            $(document).on('change keyup', '#bayar', function () {
                var bayar = $("#bayar").val().replace(/\./g, '').replace(/Rp/g, '');
                var grandTotal = $("#grand-total").html().replace(/\./g, '').replace(/Rp/g, '');
                console.log(grandTotal);
                if (Number(bayar) < Number(grandTotal)) {
                    // prevent button form submit
                    $("#save").attr('disabled', true);
                    $('#bayar').addClass('is-invalid');
                    $('#bayar').removeClass('is-valid');
                } else {
                    $("#save").attr('disabled', false);
                    $('#bayar').addClass('is-valid');
                    $('#bayar').removeClass('is-invalid');
                }

                // kembalian
                var kembalian = Number(bayar) - Number(grandTotal);
                $("#kembalian").html(formatRupiah(kembalian + '', 'Rp'));

            })
        }

        $('#bayar').keyup(function () {
            const val = $(this).val();
            $(this).val(formatRupiah(val, 'Rp'));
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
        }
    });
</script>
@break

@case('laporan-pembelian')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script>
    $(document).ready(function() {
        var minDate, maxDate;

        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'YYYY-MM-DD'
        });
        maxDate = new DateTime($('#max'), {
            format: 'YYYY-MM-DD'
        });

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[3]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        var table = $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": 10
        });

        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').change(function () {
            $("#zero-config_length option[value=-1]").attr('selected', 'selected').change();
            table.draw();
            sumTotal();
        });

        sumTotal();

        $('#zero-config_paginate').on('click', function () {
            sumTotal();
        });

        $("#zero-config_length").change(function () {
            sumTotal();
        });

        function sumTotal() {
            var sum = 0;
            $(".total").each(function () {
                sum += Number($(this).html().replace(/\./g, '').replace(/Rp/g, ''));
            });
            $("#grand-total").html(formatRupiah(sum + '', 'Rp'));
        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
        }
    });


</script>
@break

@case('laporan-penjualan')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script>

    $(document).ready(function () {
        var minDate, maxDate;

        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'YYYY-MM-DD'
        });
        maxDate = new DateTime($('#max'), {
            format: 'YYYY-MM-DD'
        });

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[2]);
                console.log(min);
                console.log(date);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        var table = $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": 10,
        });

        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').change(function () {
            $("#zero-config_length option[value=-1]").attr('selected', 'selected').change();
            table.draw();
            sumTotal();
        });

        sumTotal();

        $('#zero-config_paginate').on('click', function () {
            sumTotal();
        });

        $("#zero-config_length").change(function () {
            sumTotal();
        });

        function sumTotal() {
            var sum = 0;
            $(".total").each(function () {
                sum += Number($(this).html().replace(/\./g, '').replace(/Rp/g, ''));
            });
            $("#grand-total").html(formatRupiah(sum + '', 'Rp'));
        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
        }

    });

</script>
@break

@case('stok-obat')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [10, 25, 50, 100],
        "pageLength": 10
    });
</script>
@break

@case('laba')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script>
    $(document).ready(function () {
        $('.sidebarCollapse').click();
        var minDate, maxDate;

        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'YYYY-MM-DD'
        });
        maxDate = new DateTime($('#max'), {
            format: 'YYYY-MM-DD'
        });

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[1]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        var table = $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": 10,
        });

        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').change(function () {
            $("#zero-config_length option[value=-1]").attr('selected', 'selected').change();
            table.draw();
            sumTotal();
        });

        sumTotal();

        $('#zero-config_paginate').on('click', function () {
            sumTotal();
        });

        $("#zero-config_length").change(function () {
            sumTotal();
        });


        function sumTotal() {
            var penjualan = 0;
            var hpp = 0;
            var laba = 0;
            $(".item_penjualan").each(function () {
                penjualan += Number($(this).html().replace(/\./g, '').replace(/Rp/g, ''));
            });
            $(".item_hpp").each(function () {
                hpp += Number($(this).html().replace(/\./g, '').replace(/Rp/g, ''));
            });
            $(".item_laba").each(function () {
                laba += Number($(this).html().replace(/\./g, '').replace(/Rp/g, ''));
            });
            $("#total_penjualan").html(formatRupiah(penjualan + '', 'Rp'));
            $("#total_hpp").html(formatRupiah(hpp + '', 'Rp'));
            $("#total_laba").html(formatRupiah(laba + '', 'Rp'));
        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
        }

    });
</script>
@break

@case('pengguna')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [10, 25, 50, 100],
        "pageLength": 10
    });

</script>
@break

@default
<script>
    console.log('No custom script available.')
</script>
@endswitch
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
