<?php
/**
 * This file is a part of Parsimony.
 *
 * Parsimony is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Parsimony is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Parsimony. If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Julien Fontanet <julien.fontanet@vates.fr>
 * @license http://www.gnu.org/licenses/gpl-3.0-standalone.html GPLv3
 *
 * @package Parsimony
 */

namespace Parsimony;

final class Grammar implements
	ArrayAccess,
	Countable,
	IteratorAggregate
{
	/**
	 * @var Parsimony\Rules[]
	 */
	private $_rules = array();

	//--------------------------------------
	// ArrayAccess
	//--------------------------------------

	function offsetGet($offset)
	{
		if (!isset($this->_rules[$offset]))
		{
			$this->_rules[$offset] = new Parsimony\Rule;
		}

		return $this->_rules[$offset];
	}

	function offsetExists($offset)
	{
		return isset($this->_rules[$offset]);
	}

	function offsetUnset($offset)
	{
		unset($this->_rules[$offset]);
	}

	function offsetSet($offset, $value)
	{
		trigger_error(
			'you cannot assign to rules',
			E_USER_ERROR
		);
	}

	//--------------------------------------
	// Countable
	//--------------------------------------

	function count()
	{
		return count($this->_rules);
	}

	//--------------------------------------
	// IteratorAggregate
	//--------------------------------------

	function countable()
	{
		return count($this->_rules);
	}
}
