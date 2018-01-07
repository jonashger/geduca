package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QContatoEmpresa is a Querydsl query type for ContatoEmpresa
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QContatoEmpresa extends EntityPathBase<ContatoEmpresa> {

    private static final long serialVersionUID = 1455666551L;

    public static final QContatoEmpresa contatoEmpresa = new QContatoEmpresa("contatoEmpresa");

    public final NumberPath<Long> codigoEmpresa = createNumber("codigoEmpresa", Long.class);

    public final NumberPath<Long> codigoTipoContato = createNumber("codigoTipoContato", Long.class);

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QContatoEmpresa(String variable) {
        super(ContatoEmpresa.class, forVariable(variable));
    }

    public QContatoEmpresa(Path<? extends ContatoEmpresa> path) {
        super(path.getType(), path.getMetadata());
    }

    public QContatoEmpresa(PathMetadata<?> metadata) {
        super(ContatoEmpresa.class, metadata);
    }

}

