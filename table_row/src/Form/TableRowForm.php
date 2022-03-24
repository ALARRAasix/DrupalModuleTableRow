<?php
//Ruta del Form File
namespace Drupal\table_row\Form;
//Llibreries necessaris
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerTrait;
//Clase per crear el formulari
class TableRowForm extends FormBase {
    //Obtenir ID del Formulari.
  /**
   * {@inheritdoc}
   */
    public function getFormId() {
        return 'table_row';
      }

    //Funcio del Formulari.
    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['Numero'] = [
            '#type' => 'number',
            '#title' => $this->t('Introdueix un Número que equival a la quantitat de files que es generaran'),
        ];
        
        //Variable per guardar el valor introduit
        $FileNumber = $form_state->getValue(['Numero']);
        $form_state->setValue(['Numero'], $FileNumber);
        
        //Creació taula
        $form['Taula'] = [
            '#type' => 'table',
            '#title' => 'My Table',
            '#header' => array('Files'),
        ];

        //Loop per cada fila
        for ($i=1; $i<=$FileNumber; $i++) {
            $form['Taula'][$i]['Files'] = [
                '#type' => 'textfield',
                '#title' => t('Files'),
                '#title_display' => 'invisible',
                '#default_value' => 'Fila'.$i,
            ];  

        }
       
        //Button Crear Taula
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Crear Taula'),
        ];
 
        return $form;
    }

    /**
   * {@inheritdoc}
   */
 
    //Button Function (Crear Taula)
    public function submitForm(array &$form, FormStateInterface $form_state) {

        //Obtenir valors al crear taula.
        $values = $form_state->getValues();

        //Reiniciar cada Crear Taula al nou valor.
        $form_state->setRebuild();

    }
 
}