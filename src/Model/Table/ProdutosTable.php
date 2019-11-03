<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $Categorias
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\HasMany $Images
 * @property \App\Model\Table\PedidosTable&\Cake\ORM\Association\BelongsToMany $Pedidos
 *
 * @method \App\Model\Entity\Produto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produto findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdutosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('produtos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'produto_id'
        ]);
        $this->belongsToMany('Pedidos', [
            'foreignKey' => 'produto_id',
            'targetForeignKey' => 'pedido_id',
            'joinTable' => 'produtos_pedidos'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 50)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->numeric('valor_compra')
            ->requirePresence('valor_compra', 'create')
            ->notEmptyString('valor_compra');

        $validator
            ->numeric('valor_venda')
            ->allowEmptyString('valor_venda');

        $validator
            ->scalar('status')
            ->maxLength('status', 50)
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));

        return $rules;
    }
}
