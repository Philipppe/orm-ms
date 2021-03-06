<?php

class Poc extends Orm
{   
	function __construct()
	{
		parent::__autoload();
		parent::__construct();
	}

	function GetName()
	{
		return 'Poc';
	}

	function GetFriendlyName()
	{
		return $this->Lang('friendlyname');
	}

	function GetVersion()
	{
		return '0.0.1';
	}

	function GetDependencies()
	{
		return array('Orm'=>'0.0.1');
	}

	function GetHelp()
	{
		return $this->Lang('help');
	}

	function GetAuthor()
	{
		return 'Kevin Danezis (aka Bess)';
	}

	function GetAuthorEmail()
	{
		return 'contact at furie point be';
	}

	function GetChangeLog()
	{
		return $this->Lang('changelog');
	}

	function GetAdminDescription()
	{
		return $this->Lang('moddescription');
	}

	function MinimumCMSVersion()
	{
		return "1.11.0";
	}

	function IsPluginModule()
	{
		return true;
	}

	function HasAdmin()
	{
		return true;
	}

	function GetAdminSection()
	{
		return 'extensions';
	}

	function VisibleToAdminUser()
	{
		return true;
	}

	function InitializeFrontend()
	{
	}

	function InitializeAdmin()
	{
	}

	function AllowSmartyCaching()
	{
		return false;
	}

	function LazyLoadFrontend()
	{
		return false;
	}

	function LazyLoadAdmin()
	{
		return false;
	}

	function SetParameters()
	{
		$this->RegisterModulePlugin();
	}

	function InstallPostMessage()
	{
		return $this->Lang('postinstall');
	}

	function UninstallPostMessage()
	{
		return $this->Lang('postuninstall');
	}

	function UninstallPreMessage()
	{
		return $this->Lang('really_uninstall');
	}

	function DisplayErrorPage($msg)
	{
		echo "<h3>".$msg."</h3>";
	}  
} 

?>
