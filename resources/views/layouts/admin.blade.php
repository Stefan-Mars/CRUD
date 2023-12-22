<table id="myTable">
    <tr class="border">
        <td class="p-2 text-xl @if(Request::url() === url('/admin/attributes')) bg-gray-300 @endif">
            <a href="/admin/attributes">Attribuut Editor</a>
        </td>
        <td class="p-2 text-xl @if(Request::url() === url('/admin/accounts')) bg-gray-300 @endif visible sm:hidden">
            <a href="/admin/accounts">Account Editor</a>
        </td>
    </tr>
    <tr class="hidden border sm:block">
        <td class="p-2 text-xl @if(Request::url() === url('/admin/accounts')) bg-gray-300 @endif">
            <a href="/admin/accounts">Account Editor</a>
        </td>
    </tr>
</table>


