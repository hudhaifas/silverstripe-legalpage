<?php

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Jan 29, 2018 - 2:33:14 PM
 */
class LegalPageController
        extends PageController {

    private static $allowed_actions = [
        'archive'
    ];
    private static $url_handlers = [
        'archive/$VersionID/$OriginID' => 'archive'
    ];

    public function archive() {
        $versions = $this->allVersions();
        if (!$versions) {
            return;
        }

        $versionID = $this->getRequest()->param('VersionID');
        $originID = $this->getRequest()->param('OriginID');

        if ($versionID && $originID) {
            $version = $this->compareVersions($versionID, $originID);

            return $this
                            ->customise([
                                'Content' => $version->Content,
                                'VersionDate' => $version->LastEdited
                            ])
                            ->renderWith(['LegalPage', 'LegalPage', 'Page']);
        } else {
            $currentVersionID = $this->Version;

            foreach ($versions as $k => $version) {
                $active = false;

                if ($version->Version == $currentVersionID) {
                    $active = true;
                }

                $version->Active = ($active);
            }

            return $this
                            ->customise([
                                'Versions' => $versions
                            ])
                            ->renderWith(['LegalPage_versions', 'LegalPage', 'Page']);
        }
    }

    public function VersionLink($id) {
        return $this->Link("archive/$id/$id");
    }

    public function CompareLink($id) {
        return $this->Link("archive/$id/{$this->Version}");
    }

    public function getVersionDate() {
        $date = new DateTime($this->LastEdited);
        return $date->Format('M j, Y');
    }

}
