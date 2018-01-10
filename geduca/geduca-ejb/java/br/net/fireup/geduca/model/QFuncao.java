package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QFuncao is a Querydsl query type for Funcao
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QFuncao extends EntityPathBase<Funcao> {

    private static final long serialVersionUID = 1362029674L;

    public static final QFuncao funcao = new QFuncao("funcao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final NumberPath<Long> pessoa = createNumber("pessoa", Long.class);

    public final NumberPath<Long> tipo = createNumber("tipo", Long.class);

    public final NumberPath<Long> tipoFuncao = createNumber("tipoFuncao", Long.class);

    public QFuncao(String variable) {
        super(Funcao.class, forVariable(variable));
    }

    public QFuncao(Path<? extends Funcao> path) {
        super(path.getType(), path.getMetadata());
    }

    public QFuncao(PathMetadata<?> metadata) {
        super(Funcao.class, metadata);
    }

}

