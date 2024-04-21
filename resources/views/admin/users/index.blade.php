<x-layout.default>


    <div x-data="invoiceList">
        <script src="/assets/js/simple-datatables.js"></script>
        <h5 class="font-semibold text-lg dark:text-white-light">User Management </h5>
        <div class="panel px-0 border-[#e0e6ed] dark:border-[#1b2e4b]">
            <div class="px-5">

                <div class="md:absolute md:top-5 ltr:md:left-5 rtl:md:right-5">

                    <div class="flex items-center gap-2 mb-5">

                        <button type="button" class="btn btn-info gap-2">
                            Total Members:
                            {{ $total_members}} </button>
                        <a href="javascript:;" class="btn btn-primary gap-2">
                            Total Admins:
                            {{ $total_admins}}</a>
                            <form method="GET" action="{{ route('admin.users.index') }}">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search by name or email">
            <button type="submit">Search</button>
        </form>
                    </div>
                   

                </div>
            </div>
            <div class="invoice-table">
          <br /><br />
        <table>
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as  $key => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $key }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                            <a href="{{ route('admin.users.ban', $user->id) }}">Ban</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
            </div>

        </div>
    </div>

   
</x-layout.default>