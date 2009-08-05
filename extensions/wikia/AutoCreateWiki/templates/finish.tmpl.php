<!-- s:<?= __FILE__ ?> -->
<style type="text/css">
.awc-domain {font-size:2.5em;font-style:normal;padding:10px;}
.awc-title {font-size:1.3em;font-style:normal;color:#000;font-weight:bold;}
.awc-subtitle {font-size:1.1em;font-style:normal;color:#000;}
</style>

<div class="awc-title"><?=wfMsg('autocreatewiki-success-title')?></div>
<br />
<div class="awc-subtitle"><?=wfMsg('autocreatewiki-success-subtitle')?></div>


<div style="font-style: normal;" class="clearfix" id="nwb_link">
	<div class="awc-title"><?=$domain?></div>
	<div class="awc-subtitle"><?=wfMsg('autocreatewiki-success-has-been-created')?></div>

	<div style="position: absolute; left: 50%; margin-top: 20px;">
		<a href="<?=$domain?>wiki/Special:NewWikiBuilder" class="bigButton" style="margin-left: -50%;"><big><?=wfMsg('autocreatewiki-success-get-started')?></big><small></small></a>
	</div>
</div>

<!-- e:<?= __FILE__ ?> -->
