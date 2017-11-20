<?php

namespace DotsUnited\PhpCsFixer;

use PhpCsFixer\Config;

final class Php56Config extends Config
{
    public function __construct()
    {
        parent::__construct('Dots United (PHP 5.6)');

        $this->setRiskyAllowed(true);
    }

    public function getRules()
    {
        $rules = [
            '@Symfony' => true,
            'align_multiline_comment' => false,
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'blank_line_before_return' => true,
            'class_keyword_remove' => false,
            'combine_consecutive_issets' => false,
            'combine_consecutive_unsets' => true,
            'compact_nullable_typehint' => false,
            'concat_space' => [
                'spacing' => 'one',
            ],
            'declare_strict_types' => false,
            'dir_constant' => false,
            'doctrine_annotation_array_assignment' => false,
            'doctrine_annotation_indentation' => false,
            'doctrine_annotation_spaces' => false,
            'doctrine_annotation_braces' => false,
            'ereg_to_preg' => false,
            'function_to_constant' => true,
            'general_phpdoc_annotation_remove' => false,
            'hash_to_slash_comment' => true,
            'header_comment' => false,
            'heredoc_to_nowdoc' => false,
            'is_null' => [
                'use_yoda_style' => true,
            ],
            'linebreak_after_opening_tag' => true,
            'list_syntax' => false,
            'mb_str_functions' => false,
            'modernize_types_casting' => true,
            'native_function_invocation' => false,
            'no_alias_functions' => true,
            'no_blank_lines_before_namespace' => false,
            'no_homoglyph_names' => true,
            'no_multiline_whitespace_before_semicolons' => true,
            'no_null_property_initialization' => false,
            'no_php4_constructor' => true,
            'no_short_echo_tag' => true,
            'no_unreachable_default_argument_value' => true,
            'no_useless_else' => true,
            'no_useless_return' => false,
            'no_superfluous_elseif' => true,
            'non_printable_character' => true,
            'not_operator_with_space' => false,
            'not_operator_with_successor_space' => false,
            'ordered_class_elements' => true,
            'ordered_imports' => [
                'sortAlgorithm' => 'alpha',
            ],
            'php_unit_construct' => false,
            'php_unit_dedicate_assert' => false,
            'php_unit_expectation' => false,
            'php_unit_mock' => false,
            'php_unit_namespaced' => false,
            'php_unit_no_expectation_annotation' => false,
            'php_unit_strict' => false,
            'php_unit_test_class_requires_covers' => false,
            'phpdoc_add_missing_param_annotation' => [
                'only_untyped' => false,
            ],
            'phpdoc_order' => true,
            'phpdoc_types' => true,
            'phpdoc_types_order' => false,
            'pow_to_exponentiation' => false,
            'pre_increment' => true,
            'psr0' => false,
            'psr4' => false,
            'random_api_migration' => true,
            'silenced_deprecation_error' => false,
            'simplified_null_return' => false,
            'strict_comparison' => false,
            'strict_param' => false,
            'ternary_to_null_coalescing' => false,
            'void_return' => false,
        ];

        return $rules;
    }
}
