<x-layout.default>


    <div x-data="invoiceList">
        <script src="/assets/js/simple-datatables.js"></script>
        <h5 class="font-semibold text-lg dark:text-white-light">Transactions</h5>
        <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
            <div class="px-5">

                <div class="md:absolute md:top-5 ltr:md:left-5 rtl:md:right-5">

                    <div class="flex items-center gap-2 mb-5">

                        <h3>{{$purpose}}</h3>

                    </div>
                </div>
            </div>
            <div class="invoice-table">
                <table id="myTable" class="whitespace-nowrap"></table>
            </div>

        </div>
    </div>

    <script>
        // console.log({
        //     !!$transactions!!
        // });


        document.addEventListener("alpine:init", () => {
            Alpine.data('invoiceList', () => ({
                selectedRows: [],
                items: @json($transactions),

                searchText: '',
                datatable: null,
                dataArr: [],

                init() {
                    this.setTableData();
                    this.initializeTable();
                    this.$watch('items', value => {
                        this.datatable.destroy()
                        this.setTableData();
                        this.initializeTable();
                    });
                    this.$watch('selectedRows', value => {
                        this.datatable.destroy()
                        this.setTableData();
                        this.initializeTable();
                    });
                },

                initializeTable() {
                    this.datatable = new simpleDatatables.DataTable('#myTable', {
                        data: {
                            headings: [
                                '<input type="checkbox" class="form-checkbox" :checked="checkAllCheckbox" :value="checkAllCheckbox" @change="checkAll($event.target.checked)"/>',

                                "Purpose",
                                "Email",
                                "Amount",

                                "Reference No.",
                                "Status",
                                "Date",

                                "Action",


                            ],
                            data: this.dataArr
                        },
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                sortable: false,
                                render: function(data, cell, row) {
                                    return `<input type="checkbox" class="form-checkbox mt-1" :id="'chk' + ${data}" :value="(${data})" x-model.number="selectedRows" />`;
                                }
                            },
                            {
                                select: 4,
                                render: function(data, cell, row) {
                                    return '<a href="/transactions/receipt/'+data+'" class="text-primary underline font-semibold hover:no-underline">#' +
                                        data + '</a>';
                                }
                            },
                            {
                                select: 2,
                                render: function(data, cell, row) {
                                    return `<div class="flex items-center font-semibold"><div class="p-0.5 bg-white-dark/30 rounded-full w-max ltr:mr-2 rtl:ml-2"><img class="h-8 w-8 rounded-full object-cover" src="/assets/images/profile-${row.dataIndex + 1}.jpeg" /></div>${data}</div>`;
                                }
                            },
                            {
                                select: 3,
                                render: function(data, cell, row) {
                                    return '<div class="font-semibold">₦' + data +
                                        '</div>';
                                }
                            },
                            {
                                select: 5,
                                render: function(data, cell, row) {
                                    let styleClass = data == 'Success' ?
                                        'badge-outline-success' :
                                        'badge-outline-danger';
                                    return '<span class="badge ' + styleClass + '">' +
                                        data + '</span>';
                                },
                            },
                            {
                                select: 7,
                                sortable: false,
                                render: function(data, cell, row) {
                                    return `<div class="flex gap-4 items-center">

                                                <a href="/apps/invoice/preview" class="hover:text-primary">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                                        <path
                                                            opacity="0.5"
                                                            d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                                            stroke="currentColor"
                                                            stroke-width="1.5"
                                                        ></path>
                                                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    </svg>
                                                </a>
                                               
                                            </div>`;
                                }
                            }
                        ],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "<span class='ml-2'>{select}</span>",
                            noRows: "No data available",
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    });
                },

                checkAllCheckbox() {
                    if (this.items.length && this.selectedRows.length === this.items.length) {
                        return true;
                    } else {
                        return false;
                    }
                },

                checkAll(isChecked) {
                    if (isChecked) {
                        this.selectedRows = this.items.map((d) => {
                            return d.id;
                        });
                    } else {
                        this.selectedRows = [];
                    }
                },

                setTableData() {
                    this.dataArr = [];
                    for (let i = 0; i < this.items.length; i++) {
                        this.dataArr[i] = [];
                        for (let p in this.items[i]) {
                            if (this.items[i].hasOwnProperty(p)) {
                                this.dataArr[i].push(this.items[i][p]);
                            }
                        }
                    }
                },

                searchInvoice() {
                    return this.items.filter((d) =>
                        (d.invoice && d.invoice.toLowerCase().includes(this.searchText)) ||
                        (d.name && d.name.toLowerCase().includes(this.searchText)) ||
                        (d.email && d.email.toLowerCase().includes(this.searchText)) ||
                        (d.date && d.date.toLowerCase().includes(this.searchText)) ||
                        (d.amount && d.amount.toLowerCase().includes(this.searchText)) ||
                        (d.status && d.status.toLowerCase().includes(this.searchText))
                    );
                },

                deleteRow(item) {
                    if (confirm('Are you sure want to delete selected row ?')) {
                        if (item) {
                            this.items = this.items.filter((d) => d.id != item);
                            this.selectedRows = [];
                        } else {
                            this.items = this.items.filter((d) => !this.selectedRows.includes(d.id));
                            this.selectedRows = [];
                        }
                    }
                },


            }))
        })
    </script>
</x-layout.default>