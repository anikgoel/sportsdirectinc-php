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

    public function getBoxScore($season, $competition_id) {
        $url = $this->base_url . "/" . $this->api_version . $this->mid_url_link . "/boxscores/" . $season . "/boxscore_NHL_$competition_id.xml?apiKey=" . $this->api_key;
        return $this->_sendHit($url);
    }

    public function getTeamPlayers($season, $team_id) {
        $url = $this->base_url . "/" . $this->api_version . $this->mid_url_link . "/players/" . $season . "/players_{$team_id}_NHL.xml?apiKey=" . $this->api_key;
        return $this->_sendHit($url);
    }

}
