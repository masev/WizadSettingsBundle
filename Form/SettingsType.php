<?php

/*
 * This file is part of the WizadSettingBundle package.
 *
 * (c) William Pottier <wpottier@allprogrammic.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Wizad\SettingsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SettingsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $schema = $options['schema'];

        foreach ($schema as $name => $parameter) {
            $builder->add(sprintf('setting_%s', $name), $parameter['form']['type'], array('label' => $parameter['name'], 'required' => false));
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wizad\SettingsBundle\Model\Settings'
        ));

        $resolver->setRequired(array('schema'));
    }

    public function getName()
    {
        return 'wizad_settings_edit';
    }
}