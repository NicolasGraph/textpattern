<?php

/*
 * Textpattern Content Management System
 * https://textpattern.com/
 *
 * Copyright (C) 2018 The Textpattern Development Team
 *
 * This file is part of Textpattern.
 *
 * Textpattern is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, version 2.
 *
 * Textpattern is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Textpattern. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * Css
 *
 * Manages stylesheets.
 *
 * @since   4.7.0
 * @package Skin
 */

namespace Textpattern\Skin {

    class Css extends AssetBase implements CssInterface
    {
        protected static $extension = 'css';
        protected static $dir = 'styles';
        protected static $fileContentsField = 'css';
        protected static $essential = array(
            array(
                'name' => 'default',
                'css' => '/* Contents of the css tag goes here. See https://docs.textpattern.io/tags/css */'
            ),
        );

        /**
         * Asset mimetypes.
         *
         * @var array Associative array of 'extension' => 'mimetype'
         */

        protected static $mimeTypes;

        /**
         * $mimeTypes property setter.
         */

        public static function _init()
        {
            static::$mimeTypes = array(
                'txt'  => 'text/plain',
                'csv'  => 'text/csv',
                'htm'  => 'text/html',
                'html' => 'text/html',
                // 'css'  => 'text/css',
                'js'   => 'application/javascript',
                'json' => 'application/json',
                'xml'  => 'application/xml',
                'svg'  => 'image/svg+xml'
            ); // parse_ini_string(implode(n, do_list_unique(get_pref('assets_mimetypes'))));
        }

        /**
         * $mimeTypes property getter.
         *
         * @return string static::$mimeTypes.
         */

        public static function getMimeTypes()
        {
            return static::$mimeTypes;
        }

        /**
         * Get a mime type from an extension, as defined in the $mimeTypes property.
         *
         * @return mixed Mime type of FALSE.
         */

        protected static function getMimeType($extension)
        {
            $mimeTypes = self::getMimeTypes();

            return isset($mimeTypes[$extension]) ? $mimeTypes[$extension] : false;
        }

        /**
         * {@inheritdoc}
         */

        public function setInfos(
            $name,
            $css = null
        ) {
            $name = $this->setName($name)->getName();

            $this->infos = compact('name', 'css');

            return $this;
        }
    }
}
