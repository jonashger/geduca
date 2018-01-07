package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QContatoPessoa is a Querydsl query type for ContatoPessoa
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QContatoPessoa extends EntityPathBase<ContatoPessoa> {

    private static final long serialVersionUID = -61061895L;

    public static final QContatoPessoa contatoPessoa = new QContatoPessoa("contatoPessoa");

    public final NumberPath<Long> codigoPessoa = createNumber("codigoPessoa", Long.class);

    public final NumberPath<Long> codigoTipoContato = createNumber("codigoTipoContato", Long.class);

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QContatoPessoa(String variable) {
        super(ContatoPessoa.class, forVariable(variable));
    }

    public QContatoPessoa(Path<? extends ContatoPessoa> path) {
        super(path.getType(), path.getMetadata());
    }

    public QContatoPessoa(PathMetadata<?> metadata) {
        super(ContatoPessoa.class, metadata);
    }

}

