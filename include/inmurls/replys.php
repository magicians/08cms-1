<?
(!defined('M_COM') || !defined('M_ADMIN')) && exit('No Permission');
if(empty($submitmode)){
	tabfooter();

	tabheader(lang('arangeset'));//只需要筛选文档模型即可
	$checkedarr = array('-1' => lang('nolimit'),'0' => lang('nocheck'),'1' => lang('checked'));
	trbasic(lang('arange').lang('check_state'),'',makeradio('inmurlnew[setting][checked]',$checkedarr,!isset($inmurl['setting']['checked']) ? '-1' : $inmurl['setting']['checked']),'');
	tabfooter();

	tabheader(lang('pageresult'));
	$tnstr = "<input type=\"text\" size=\"25\" id=\"inmurlnew[tplname]\" name=\"inmurlnew[tplname]\" value=\"$inmurl[tplname]\">&nbsp; 
			<input class=\"checkbox\" type=\"checkbox\" name=\"inmurlnew[onlyview]\" id=\"inmurlnew[onlyview]\" value=\"1\"".(empty($inmurl['onlyview']) ? '' : ' checked').">".lang('onlyview');
	trbasic(lang('customapage'),'',$tnstr,'',lang('agcustomapage'));
	$filtersarr = array(
	'check' => lang('check_state'),
	);
	trbasic(lang('view_filters')."<br><input class=\"checkbox\" type=\"checkbox\" name=\"chkallfilters\" onclick=\"checkall(this.form,'filtersnew','chkallfilters')\">".lang('selectall'),'',makecheckbox('filtersnew[]',$filtersarr,empty($inmurl['setting']['filters']) ? array() : explode(',',$inmurl['setting']['filters']),5),'',lang('agnoselect1'));

	$listsarr = array(
	'mname' => lang('member'),
	'check' => lang('check_state'),
	'adddate' => lang('add_time'),
	'updatedate' => lang('update_time'),
	'edit' => lang('edit'),//合辑管理工具
	);
	trbasic(lang('view_lists')."<br><input class=\"checkbox\" type=\"checkbox\" name=\"chkalllists\" onclick=\"checkall(this.form,'listsnew','chkalllists')\">".lang('selectall'),'',makecheckbox('listsnew[]',$listsarr,empty($inmurl['setting']['lists']) ? array() : explode(',',$inmurl['setting']['lists']),5),'',lang('agnoselect1'));
	$operatesarr = array(
	'delete' => lang('delete'),
	'check' => lang('check'),
	'uncheck' => lang('uncheck'),
	);
	trbasic(lang('view_operates')."<br><input class=\"checkbox\" type=\"checkbox\" name=\"chkalloperates\" onclick=\"checkall(this.form,'operatesnew','chkalloperates')\">".lang('selectall'),'',makecheckbox('operatesnew[]',$operatesarr,empty($inmurl['setting']['operates']) ? array() : explode(',',$inmurl['setting']['operates']),5),'',lang('agnoselect1'));
	trbasic(lang('adm_title'),'inmurlnew[mtitle]',$inmurl['mtitle'],'text',lang('aga_title'));
	trbasic(lang('adm_guide'),'inmurlnew[guide]',$inmurl['guide'],'textarea',lang('aga_title'));
}else{
	foreach(array('filters','lists','operates',) as $var){
		$inmurlnew['setting'][$var] = empty(${$var.'new'}) ? '' : implode(',',${$var.'new'});
	}
	$inmurlnew['url'] = "?action=inreplys&nimuid=$imuid&aid=";
}

?>