<div class="container legalpage">
    <h1>$Title</h1>
    <div class="legal-lastupdate">
        <div class="legal-lock">
            <i class="fa fa-gavel fa-2x" aria-hidden="true"></i>
        </div>
        <div class="legal-clearance">
            <%t Legal.LAST_EDITED 'This Document was last updated on {date}.' date=$VersionDate %> (<%t Legal.VIEW_VERSIONS 'view <a href="{link}">archived versions</a>' link=$Link(archive) %>)
            <br>
            <%t Legal.NOTE 'If you have not reviewed it since that date, please do so now.' %>
        </div>
    </div>

    $Content
</div>
