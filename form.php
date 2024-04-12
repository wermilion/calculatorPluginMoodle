<?php
declare(strict_types=1);

require_once($CFG->libdir . '/formslib.php');

class block_calculator_form extends moodleform
{
    /**
     * Форма для ввода коэффициентов квадратного уравнения
     *
     * @return void
     * @throws coding_exception
     */
    public function definition(): void
    {
        $form = $this->_form;

        $form->addElement('text', 'a', get_string('a', 'block_calculator'));
        $form->setType('a', PARAM_FLOAT);
        $form->addRule('a', get_string('required'), 'required', null, 'client');
        $form->addRule('a', get_string('numeric', 'block_calculator'), 'numeric', null, 'client');
        $form->addRule('a', get_string('notzero', 'block_calculator'), 'regex', '/^-?(?!0+(\.0+)?$)\d+(\.\d+)?$/', 'client');

        $form->addElement('text', 'b', get_string('b', 'block_calculator'));
        $form->setType('b', PARAM_FLOAT);
        $form->addRule('b', get_string('required'), 'required', null, 'client');
        $form->addRule('b', get_string('numeric', 'block_calculator'), 'numeric', null, 'client');

        $form->addElement('text', 'c', get_string('c', 'block_calculator'));
        $form->setType('c', PARAM_FLOAT);
        $form->addRule('c', get_string('required'), 'required', null, 'client');
        $form->addRule('c', get_string('numeric', 'block_calculator'), 'numeric', null, 'client');

        $this->add_action_buttons(false, get_string('solution', 'block_calculator'));
    }
}