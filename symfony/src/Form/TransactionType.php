<?php

namespace App\Form;

use App\Entity\Transaction;
use App\Entity\CompteBancaire;
use App\Repository\CompteBancaireRepository;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
                'disabled' => 'true'
            ])
            ->add('montant')
            ->add('doneAt', DateType::class,
            [
                'years' => range(1940, 2020),
                'format' => 'ddMMMMyyyy'
            ])
            ->add('compteDebite', EntityType::class, [
                'class' => CompteBancaire::class,
                'choice_label' => 'iban',
                'help' => 'Votre compte à débiter'
            ])
            ->add('compteCredite', EntityType::class, [
                'class' => CompteBancaire::class,
                'choice_label' => 'iban',
                'help' => 'Votre compte ou celui d\' un bénéficiaire à créditer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
