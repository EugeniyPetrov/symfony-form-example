<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaginatorType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'label' => false,
            ])
            ->setRequired(['items_per_page', 'total_count']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['items_per_page'] = $options['items_per_page'];
        $view->vars['total_count'] = $options['total_count']();
    }

    public function getParent(): string
    {
        return IntegerType::class;
    }
}
