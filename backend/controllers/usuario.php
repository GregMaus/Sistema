<?php

/**
 * usuario
 * 
 * Controller para interações com usuários.
 * 
 * @package Backend
 * @subpackage controllers   
 * @author sistema
 * @copyright Gregori Maus
 * @version 2011
 * @access public
 */

class usuario extends Controller
{

    /**
     * usuario::Usuario()
     * 
     * @return void
     * @access public
     * 
     */
    public function Usuario()
    {
        parent::Controller();
    }


    /**
     * usuario::index()
     * 
     * 
     * @uses usuario_model::get_all()
     * @return void
     * @access public
     */
    public function index()
    {

        $this->load->model('usuario_model');

        if ($this->session->userdata('logged_in'))
        {

            $data['grao'] = array('Usuários', 'Ver Usuários');

            $data['usuarios'] = $this->usuario_model->get_all();

            //ESTA VIEW SEMPRE ANTES DOS OUTROS
            $this->load->view('dashboard_view', $data);

            $this->load->view('usuario/index');

        } else
        {

            redirect('Login');

        }


    }


    /**
     * usuario::add_usuario()
     * 
     * Método para adição de usuários.
     * 
     * @uses usuario_model::add_records()
     * @uses form_validation::run()
     * @uses Message:set()
     * @return void
     * @access public
     */
    public function add_usuario()
    {

        $this->load->model('usuario_model');


        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_rules('rsenha', 'Confirmação', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        if ($this->form_validation->run())
        {

            $data = array('adm_tipo_usuario_id_tipo_usuario' => $this->input->post('tipo'),
                'nome' => $this->input->post('nome'), 'login' => $this->input->post('login'),
                'email' => $this->input->post('email'), 'senha' => md5($this->input->post('senha')),
                'created_at' => date(), );


            if ($this->usuario_model->add_records($data))
            {

                $this->message->set('Seção cadastrada com Sucesso!', 'success');

                redirect('Usuario');
            }

        } else
        {

            redirect('Usuario/novo_usuario');

        }

    }


    /**
     * usuario::novo_usuario()
     * 
     * Método que trabalha direcionando e montando a tela de 
     * adição de usuários
     * 
     * @uses usuario_model::get_tipo()
     * @return void
     * @access public
     * 
     */
    public function novo_usuario()
    {

        $this->load->model('usuario_model');


        $data['tipos'] = $this->usuario_model->get_tipo();

        $data['grao'] = array('Usuários', 'Novo Usuário');

        //ESTA VIEW SEMPRE ANTES DOS OUTROS
        $this->load->view('dashboard_view', $data);

        $this->load->view('usuario/new');


    }


    /**
     * usuario::usuario_edit()
     * 
     * Método que trabalha montando e organizando a
     * tela para edição de usuário.
     * 
     * @uses usuario_model::get_tipo()
     * @uses usuario_model::get_by_id()
     * @param int $id
     * @return void
     * @access public
     * 
     */
    public function usuario_edit($id)
    {

        $this->load->model('usuario_model');


        $data['tipos'] = $this->usuario_model->get_tipo();

        $data['dados'] = $this->usuario_model->get_by_id($id);

        $data['grao'] = array('Usuários', 'Novo Usuário');

        //ESTA VIEW SEMPRE ANTES DOS OUTROS
        $this->load->view('dashboard_view', $data);

        $this->load->view('usuario/edit');


    }


    /**
     * usuario::usuario_update()
     * 
     * Método que trabalha as variáveis para realizar o update na tabela.
     * 
     * @uses form_validation::set_rules()
     * @uses form_validation::run()
     * @uses usuario_model::update_records()
     * @param int $id
     * @return void
     * @access public
     * 
     */
    public function usuario_update($id)
    {

        $this->load->model('usuario_model');

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_rules('rsenha', 'Confirmação', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run())
        {

            $options = array('id' => $id, 'adm_tipo_usuario_id_tipo_usuario' => $this->
                input->post('tipo'), 'nome' => $this->input->post('nome'), 'login' => $this->
                input->post('login'), 'email' => $this->input->post('email'), 'senha' => md5($this->
                input->post('senha')), );

            if ($this->usuario_model->update_record($options))
            {

                redirect('Usuario');

            } else
            {

                redirect('Usuario/usuario_edit/' . $id);
            }

        } else
        {

            redirect('Usuario/usuario_edit/' . $id);

        }

    }


    /**
     * usuario::usuario_delete()
     * 
     * Controla a exclusão do usuário.
     * 
     * @uses usuario_model::delete_record()
     * @return void
     * @access public
     * 
     */
    public function usuario_delete()
    {

        $this->load->model('usuario_model');

        if ($this->usuario_model->delete_records())
        {

            redirect('Usuario');

        }
    }


}

?>
