<?php

class AccountOpeningInvitationClient extends SMoneyClient
{

	public function postSubAccount(AccountOpeningInvitation $invitation)
	{
		return $this->postObject($invitation, 'accountopeninginvitations');
	}
	
	public function getAccountOpeningInvitation($Id)
	{
	 	return $this->postObject('AccountOpeningInvitation', 'accountopeninginvitations/'.$Id);
	}

}
