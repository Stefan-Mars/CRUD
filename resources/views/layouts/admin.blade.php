<table id="myTable">
    <tr class="border">
        <td class="p-2 text-xl"><a href="/admin/attributes">Attribuut Editor</a></td>
    </tr>
    <tr class="border">
        <td class="p-2 text-xl"><a href="/admin/accounts">Account Editor</a></td>
    </tr>
</table>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tableRows = document.querySelectorAll('#myTable tr');

    tableRows.forEach(row => {
        const link = row.querySelector('a');
        if (link && window.location.href === link.getAttribute('href')) {
            row.classList.add('bg-gray-500');
        }
    });
});
</script>