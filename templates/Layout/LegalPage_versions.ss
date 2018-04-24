<div class="container legalpage">
    <h1>$Title</h1>

    <div class="space24"></div>
    <ul>
        <% loop $Versions %>
        <li id="page-$RecordID-version-$Version">
            <a href="$Up.VersionLink($Version)" title="$LastEdited.Ago - $LastEdited.Nice"><% if Active %><%t Legal.CURRENT_VERSION 'Current version' %><% else %>$LastEdited.Nice<% end_if %></a>
            <ul>
                <li><a href="$Up.CompareLink($Version)"><%t Legal.COMPARISON 'Comparison' %></a></li>
            </ul>
        </li>
        <% end_loop %>
    </ul>
</div>