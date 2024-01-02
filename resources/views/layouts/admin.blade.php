<table id="myTable" class="w-full sm:w-auto">
    <tr class="border">
        <td class="p-2 text-xl @if (Request::url() === url('/admin/attributes')) bg-gray-300 @endif">
            <a href="/admin/attributes" style="display: block; width: 100%; height: 100%;">Attribuut Editor</a>
        </td>
        <td class="p-2 text-xl @if (Request::url() === url('/admin/accounts')) bg-gray-300 @endif visible sm:hidden">
            <a href="/admin/accounts" style="display: block; width: 100%; height: 100%;">Account Editor</a>
        </td>
    </tr>
    <tr class="hidden border sm:block">
        <td class="p-2 text-xl @if (Request::url() === url('/admin/accounts')) bg-gray-300 @endif">
            <a href="/admin/accounts" style="display: block; width: 100%; height: 100%;">Account Editor</a>
        </td>
    </tr>
</table>
