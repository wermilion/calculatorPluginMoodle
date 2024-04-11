<?php
declare(strict_types=1);

require_once($CFG->dirroot . '/blocks/calculator/form.php');
require_once($CFG->dirroot . '/blocks/calculator/ProcessForm.php');

class block_calculator extends block_base
{
    /**
     * Инициализация блока
     *
     * @return void
     * @throws coding_exception
     */
    public function init(): void
    {
        $this->title = get_string('pluginname', 'block_calculator');
    }

    /**
     * Отображает содержимое блока
     *
     * @return stdClass
     * @throws dml_exception
     * @throws coding_exception
     */
    public function get_content(): stdClass
    {
        if ($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->text = '';

        $form = new block_calculator_form();

        if ($form->is_submitted() && $form->is_validated()) {
            $result = ProcessForm::execute((object)$form->get_data());
            $this->content->text .= $this->renderResults($result);
        }

        $this->content->text .= $form->render();

        $url = new moodle_url('/blocks/calculator/history.php');
        $linkText = get_string('history', 'block_calculator');
        $this->content->footer = html_writer::link($url, $linkText);

        return $this->content;
    }

    private function renderResults(array $result): string
    {
        $x1 = $result[0] ?? 'Нет решения';
        $x2 = $result[1] ?? 'Нет решения';
        return "Результаты вычислений: $x1; $x2 <br>";
    }
}