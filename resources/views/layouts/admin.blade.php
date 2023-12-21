<table id="myTable">
    <tr class="border @if(Request::url() === url('/admin/attributes')) bg-gray-300 @endif">
        <td class="p-2 text-xl">
            <a href="/admin/attributes">Attribuut Editor</a>
        </td>
    </tr>
    <tr class="border @if(Request::url() === url('/admin/accounts')) bg-gray-300 @endif">
        <td class="p-2 text-xl">
            <a href="/admin/accounts">Account Editor</a>
        </td>
    </tr>
</table>


