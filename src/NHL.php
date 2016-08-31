<?php

/**
 * Description of SportsDirectBase
 *
 * @author Anik
 */

namespace SportsDirect;

use SportsDirect\Base;

class NHL extends Base {

    private $api_key;
    private $api_version;
    private $mid_url_link = "/hockey/NHL";

    public function __construct($api_key, $api_version = 'v2') {
        $this->api_key = $api_key;
        $this->api_version = $api_version;
    }

    public function getSeasonResults($season) {
        $url = $this->base_url . "/" . $this->api_version . $this->mid_url_link . "/results/" . $season . "/results_NHL.xml?apiKey=" . $this->api_key;
        return $this->_sendHit($url);
    }

    public function getSeasonTeam($season) {
        $url = $this->base_url . "/" . $this->api_version . $this->mid_url_link . "/teams/" . $season . "/teams_NHL.xml?apiKey=" . $this->api_key;
        return $this->_sendHit($url);
    }

    public function getDrafterPlayerAtomFeed($updated_since = NULL) {
        $url = $this->base_url_atom . "/hockey/nhl/drafts&apiKey=" . $this->api_key . (($updated_since != NULL) ? "&newerThan=$updated_since" : "");
        return $this->_sendHit($url);
    }
    public function getBoxScoreAtomFeed($updated_since = NULL) {
        $url = $this->base_url_atom . "/hockey/nhl/boxscores&apiKey=" . $this->api_key . (($updated_since != NULL) ? "&newerThan=$updated_since" : "");
        return $this->_sendHit($url);
    }

    public function getStandingAtomFeed($updated_since = NULL) {
        $url = $this->base_url_atom . "/hockey/nhl/standings&apiKey=" . $this->api_key . (($updated_since != NULL) ? "&newerThan=$updated_since" : "");
        return $this->_sendHit($url);
    }

    public function getPlayerStatsAtomFeed($updated_since = NULL) {
        $url = $this->base_url_atom . "/hockey/nhl/player-stats&apiKey=" . $this->api_key . (($updated_since != NULL) ? "&newerThan=$updated_since" : "");
        return $this->_sendHit($url);
    }

    public function getTeamsAtomFeed($updated_since = NULL) {
        $url = $this->base_url_atom . "/hockey/nhl/teams&apiKey=" . $this->api_key . (($updated_since != NULL) ? "&newerThan=$updated_since" : "");
        return $this->_sendHit($url);
    }

    public function getPlayersAtomFeed($updated_since = NULL) {
        $url = $this->base_url_atom . "/hockey/nhl/players&apiKey=" . $this->api_key . (($updated_since != NULL) ? "&newerThan=$updated_since" : "");
        return $this->_sendHit($url);
    }

    public function getInjuryFeed($updated_since = NULL) {
        $url = $this->base_url_atom . "/hockey/nhl/injuries&apiKey=" . $this->api_key . (($updated_since != NULL) ? "&newerThan=$updated_since" : "");
        $data = $this->_sendHit($url);
        if (isset($data['entry']['id'])) {
            return array($this->_sendHit($data['entry']['id']), $data);
        } else {
            return FALSE;
        }
    }

    public function getTeamPlayers($season, $team_id) {
        $url = $this->base_url . "/" . $this->api_version . $this->mid_url_link . "/players/" . $season . "/players_{$team_id}_NHL.xml?apiKey=" . $this->api_key;
        return $this->_sendHit($url);
    }

    public function getGameSchedule($days = NULL) {
        $url = $this->base_url . "/" . $this->api_version . $this->mid_url_link . "/schedule/" . "schedule_NHL" . (($days == NULL) ? "" : "_{$days}_days") . ".xml?apiKey=" . $this->api_key;
        return $this->_sendHit($url);
    }

}
