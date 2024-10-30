<?php
/*
Plugin Name: Increase Memory Limit
Plugin URI: http://www.santosj.name
Description: Tries to increase the memory limit on hosts where increasing the memory limit is allowed. If not allowed, then the increase of memory will not be done.
Author: Jacob Santos
Version: 1.0
Author URI: http://www.santosj.name
*/

/*
Copyright (c) 2008, Jacob Santos
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
	Redistributions of source code must retain the above copyright
		notice, this list of conditions and the following disclaimer.
	Redistributions in binary form must reproduce the above copyright
		notice, this list of conditions and the following disclaimer in the
		documentation and/or other materials provided with the distribution.
	Neither the name of the Jacob Santos nor the
		names of its contributors may be used to endorse or promote products
		derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY Jacob Santos ``AS IS'' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL Jacob Santos BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

if( !function_exists('_set_memory_limit') ) :
/**
 * dragonu_set_memory_limit() - Try to set PHP memory limit to amount
 *
 * If the amount is not given, then the default is to set the amount
 * to '32MB', however the parameter available will allow setting the
 * amount to something other than '32MB'.
 *
 * Failure might mean that the memory limit is already higher than
 * either the default or the amount given. It could mean that ini_set
 * and/or ini_get has been disabled and either getting and/or setting
 * could not be accomplished.
 *
 * @since 1.0
 *
 * @param string $mib MiB amount as a string with MiB amount followed by 'M'. Default is 32M.
 * @return bool True if the amount was set by this function or already 32MB, false on failure.
 */
function dragonu_set_memory_limit($mib='32M') {
	if( !function_exists('memory_get_usage') )
		return null;

	if( (int) @ini_get('memory_limit') < absint($mib) )
		@ini_set('memory_limit', $mib);

	if( @ini_get('memory_limit') == $mib )
		return true;

	return false;
}

dragonu_set_memory_limit();
endif;